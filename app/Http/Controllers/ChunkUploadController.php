<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessVideoUpload;
use App\Models\Lecture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChunkUploadController extends Controller
{
    /**
     * Handle each chunk coming from FilePond
     */
    public function uploadChunk(Request $request)
    {
        // FilePond sends chunks with these headers
        $uploadOffset  = $request->header('Upload-Offset', 0);
        $uploadLength  = $request->header('Upload-Length');
        $uploadName    = $request->header('Upload-Name', 'video.mp4');
        $patchId       = $request->route('patchId'); // unique ID for this upload session

        $chunkDir  = storage_path('app/chunks/' . $patchId);
        $chunkFile = $chunkDir . '/chunk_' . $uploadOffset;

        // Create directory if not exists
        if (!file_exists($chunkDir)) {
            mkdir($chunkDir, 0755, true);
        }

        // Save this chunk
        file_put_contents($chunkFile, $request->getContent());

        return response('', 204); // FilePond expects 204 on success
    }

    /**
     * FilePond calls this first to initialize the upload session
     */
    public function initUpload(Request $request)
    {
        $uniqueId = uniqid('upload_', true);
        return response($uniqueId, 200)
            ->header('Content-Type', 'text/plain');
    }

    /**
     * Called after all chunks are uploaded — combine & store
     */
    public function finalizeUpload(Request $request)
    {
        $request->validate([
            'module_id'   => 'required',
            'title'       => 'required|regex:/^[a-zA-Z\s]+$/',
            'upload_id'   => 'required',
            'description' => 'nullable',
        ]);

        $uploadId  = $request->input('upload_id');
        $fileName  = $request->input('file_name', 'video.mp4');
        $chunkDir  = storage_path('app/chunks/' . $uploadId);

        if (!file_exists($chunkDir)) {
            return response()->json(['error' => 'Upload session not found'], 404);
        }

        // Combine all chunks into one file
        $finalFileName = 'lectures/' . uniqid() . '_' . $fileName;
        $finalPath     = storage_path('app/public/' . $finalFileName);

        // Make sure directory exists
        if (!file_exists(dirname($finalPath))) {
            mkdir(dirname($finalPath), 0755, true);
        }

        // Sort and merge chunks
        $chunks = glob($chunkDir . '/chunk_*');
        usort($chunks, function ($a, $b) {
            $offsetA = (int) str_replace($chunkDir . '/chunk_', '', $a);
            $offsetB = (int) str_replace($chunkDir . '/chunk_', '', $b);
            return $offsetA <=> $offsetB;
        });

        $finalFile = fopen($finalPath, 'wb');
        foreach ($chunks as $chunk) {
            fwrite($finalFile, file_get_contents($chunk));
            unlink($chunk); // delete chunk after merging
        }
        fclose($finalFile);

        // Cleanup chunk directory
        rmdir($chunkDir);

        // Dispatch background job — user doesn't wait
        ProcessVideoUpload::dispatch([
            'module_id'   => $request->input('module_id'),
            'title'       => $request->input('title'),
            'description' => $request->input('description'),
            'video_path'  => $finalFileName,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Video is being processed in background!'
        ]);
    }

    /**
     * FilePond calls this to delete/revert an upload
     */
    public function deleteUpload(Request $request)
    {
        $uploadId = $request->getContent();
        $chunkDir = storage_path('app/chunks/' . $uploadId);

        if (file_exists($chunkDir)) {
            array_map('unlink', glob($chunkDir . '/*'));
            rmdir($chunkDir);
        }

        return response('', 200);
    }
}
