<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
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
        return view('admin.pages.lecture.index');
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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $request;
        $credentials = $request->validate([
            'module_id' => 'required',
            'title' => 'required|regex:/^[a-zA-Z\s]+$/',
            'video_path' => 'required|mimes:mp4,mov,ogg,qt|max:20000',
            'description' => 'nullable',
        ]);

        $data = $credentials;

        if ($request->hasFile('video_path')) {
            $path = $request->file('video_path')->store('lectures', 'public');
            $data['video_path'] = $path;
        }

        Lecture::create($data);

        return redirect()->route('lecture.index')->with('success', 'Lecture Uploaded Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
