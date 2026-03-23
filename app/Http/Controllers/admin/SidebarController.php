<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Icon;
use App\Models\Sidebar;
use Illuminate\Http\Request;

class SidebarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.sidebar.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $icons = Icon::all();

        return view('admin.pages.sidebar.create', compact('icons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $crenditials = $request->validate([
            'title' => 'required|regex:/^[a-zA-Z\s]+$/',
            'url' => 'required',
            'order' => 'required',
            'icon' => 'required',
        ]);

        Sidebar::create($crenditials);

        return redirect()->route('sidebar.index')->with('success', 'Sidebar Created Successfully');
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
