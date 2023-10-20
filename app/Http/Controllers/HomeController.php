<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;
use App\Models\Manager;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $name = $user->name;
        $manager = Manager::all();
        $managerCount = $manager->count();
        $categories = Category::all();
        $categoryCount = $categories->count();
        $projects = Project::all();
        $projectCount = $projects->count();
        $projects = Project::paginate(2); // Menghitung jumlah proyek

        return view('home', compact('projects', 'projectCount', 'categories', 'categoryCount', 'managerCount', 'manager'));
    }
}
