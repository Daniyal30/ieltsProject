<?php

namespace App\Http\Controllers;

use App\Models\Sidebar;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $sidebars = Sidebar::where('is_active', '0')->orderBy('created_at', 'DESC')->paginate(10);
        return $sidebars;
        return view('admin.index', compact('sidebars'));
    }
}
