<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use function Symfony\Component\Clock\now;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $query = User::role('user')->orderBy('created_at', 'DESC');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search){
                $q->where('name', 'LIKE', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('is_active', $request->status);
        }

        if ($request->filled('target_band_score')) {
            $query->where('target_band_score', $request->target_band_score);
        }

        $users = $query->paginate(10)->withQueryString();

        $totalStudents = User::role('user')->count();
        $activeStudents = User::role('user')->where('is_active', 0)->count();
        $inactiveStudents = User::role('user')->where('is_active', 1)->count();

        $newThisMonth = User::role('user')
        ->whereYear('created_at', now()->format('Y'))
        ->whereMonth('created_at', now()->format('m'))
        ->count();

        // return view('admin.student.show');

        return view('admin.pages.student.index', compact(
            'users',
            'totalStudents',
            'activeStudents',
            'inactiveStudents',
            'newThisMonth'
            ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
