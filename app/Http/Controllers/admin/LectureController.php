<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Jobs\ProcessVideoUpload;
use App\Models\Lecture;
use App\Models\Module;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lectures = Lecture::with('module')->orderBy('title', 'ASC')->paginate(10);

        return view('admin.pages.lecture.index', compact('lectures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $modules = Module::all();

        return view('admin.pages.lecture.create', compact('modules'));
    }

    /**
     * Step 1 — FilePond calls this to get unique upload session ID
     */
    public function initUpload(Request $request)
    {
        $uniqueId = uniqid('upload_', true);

        // ✅ Make sure plain text string return ho
        return response($uniqueId, 200)
            ->header('Content-Type', 'text/plain; charset=utf-8');
    }

    /**
     * Step 2 — FilePond sends each chunk here
     */
    public function uploadChunk(Request $request, $patchId)
    {
        $uploadOffset = $request->header('Upload-Offset', 0);
        $chunkDir = storage_path('app/chunks/'.$patchId);
        $chunkFile = $chunkDir.'/chunk_'.$uploadOffset;

        if (! file_exists($chunkDir)) {
            mkdir($chunkDir, 0755, true);
        }

        file_put_contents($chunkFile, $request->getContent());

        return response('', 204);
    }

    /**
     * Step 3 — FilePond calls this if user cancels upload
     */
    public function deleteUpload(Request $request)
    {
        $uploadId = $request->getContent();


        if (empty($uploadId) || str_contains($uploadId, 'object') || str_contains($uploadId, 'XMLHttpRequest')) {
            return response('', 200);
        }

        $chunkDir = storage_path('app/chunks/'.$uploadId);

        if (file_exists($chunkDir)) {
            $files = glob($chunkDir.'/*');
            if ($files) {
                array_map('unlink', $files);
            }
            if (is_dir($chunkDir)) {
                rmdir($chunkDir);
            }
        }

        return response('', 200);
    }

    /**
     * Step 4 — Merge chunks + dispatch Queue Job
     */
    public function finalizeUpload(Request $request)
    {
        $request->validate([
            'module_id' => 'required',
            'title' => 'required|regex:/^[a-zA-Z\s]+$/',
            'upload_id' => 'required',
            'description' => 'nullable',
        ]);

        $uploadId = $request->input('upload_id');
        $fileName = $request->input('file_name', 'video.mp4');
        $chunkDir = storage_path('app/chunks/'.$uploadId);

        if (! file_exists($chunkDir)) {
            return response()->json(['error' => 'Upload session not found'], 404);
        }

        $finalFileName = 'lectures/'.uniqid().'_'.$fileName;
        $finalPath = storage_path('app/public/'.$finalFileName);

        if (! file_exists(dirname($finalPath))) {
            mkdir(dirname($finalPath), 0755, true);
        }


        $chunks = glob($chunkDir.'/chunk_*');
        usort($chunks, function ($a, $b) use ($chunkDir) {
            $offsetA = (int) str_replace($chunkDir.'/chunk_', '', $a);
            $offsetB = (int) str_replace($chunkDir.'/chunk_', '', $b);

            return $offsetA <=> $offsetB;
        });

        $finalFile = fopen($finalPath, 'wb');
        foreach ($chunks as $chunk) {
            fwrite($finalFile, file_get_contents($chunk));
            unlink($chunk);
        }
        fclose($finalFile);
        rmdir($chunkDir);


        ProcessVideoUpload::dispatch([
            'module_id' => $request->input('module_id'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'video_path' => $finalFileName,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Lecture is being saved!',
        ]);
    }

    /**
     * Store — ab use nahi hoga (filepond use kar raha hai)
     */
    public function store(Request $request)
    {
        return redirect()->route('lecture.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lecture $lecture)
    {
        return view('admin.pages.lecture.view', compact('lecture'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lecture $lecture)
    {
        $modules = Module::all();

        return view('admin.pages.lecture.edit', compact('lecture', 'modules'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lecture $lecture)
    {
        $request->validate([
            'module_id' => 'required',
            'title' => 'required|regex:/^[a-zA-Z\s]+$/',
            'description' => 'nullable',
            'upload_id' => 'nullable',
        ]);

        $data = [
            'module_id' => $request->input('module_id'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ];

        if ($request->input('upload_id')) {
            $uploadId = $request->input('upload_id');
            $fileName = $request->input('file_name', 'video.mp4');
            $chunkDir = storage_path('app/chunks/'.$uploadId);

            if (file_exists($chunkDir)) {
                $finalFileName = 'lectures/'.uniqid().'_'.$fileName;
                $finalPath = storage_path('app/public/'.$finalFileName);

                if (! file_exists(dirname($finalPath))) {
                    mkdir(dirname($finalPath), 0755, true);
                }

                // Chunks merge karo
                $chunks = glob($chunkDir.'/chunk_*');
                usort($chunks, function ($a, $b) use ($chunkDir) {
                    $offsetA = (int) str_replace($chunkDir.'/chunk_', '', $a);
                    $offsetB = (int) str_replace($chunkDir.'/chunk_', '', $b);

                    return $offsetA <=> $offsetB;
                });

                $finalFile = fopen($finalPath, 'wb');
                foreach ($chunks as $chunk) {
                    fwrite($finalFile, file_get_contents($chunk));
                    unlink($chunk);
                }
                fclose($finalFile);
                rmdir($chunkDir);

                $oldPath = storage_path('app/public/'.$lecture->video_path);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }

                $data['video_path'] = $finalFileName;
            }
        }

        $lecture->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Lecture updated successfully!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lecture $lecture)
    {
        $lecture->delete();

        return redirect()->route('lecture.index')->with('success', 'Lecture Deleted Successfully');
    }
}