<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;
use App\Models\Manager;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;



class ProjectController extends Controller
{
    protected $project;

    protected $projectService;
    /**
     * Display a listing of the resource.
     */
    public function __construct(Project $project)
    {
        $this->project = $project;
    }
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $projects = Project::paginate(5);
        $search = $request->input('search');

        $projects = Project::where('name_project', 'like', "%$search%")
            ->paginate(5);

        return view('project.index', compact('projects'))->with('i', ($projects->currentPage() - 1) * 2);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Gate::allows('manage-project')) {
            // Izinkan admin untuk membuat berita
            $categories = Category::all(); // Ambil semua kategori
            $manager = Manager::all();
            return view('project.create', compact('manager', 'categories'));
        } else {
            // Izin ditolak, mungkin ingin menampilkan pesan kesalahan atau mengarahkan pengguna
            return redirect()->route('home')->with('error', 'Anda tidak memiliki izin untuk membuat berita.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'manager_id' => [
                'required',
                'integer', // Tipe data harus integer
                'exists:manager,id', // Memastikan manager_id ada dalam tabel managers
            ],
            'name_project' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'status' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->store('images', 'public');
        }
        $input = $request->all();
        $project = new Project();
        $project->manager_id = $input['manager_id'];
        $project->name_project = $input['name_project'];
        $project->category_id = $input['category_id'];
        $project->description = $input['description'];
        $project->status = $input['status'];
        $project->image = $imageName;
        $project->save();
        // Set pesan flash untuk operasi penambahan kategori
        Session::flash('success', 'Data Project Added Successfully.');
        return redirect()->route('project.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::findOrFail($id); // Find the  article by its ID

        return view('project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all(); // Ambil semua kategori
        $manager = Manager::all();
        $project = Project::with('manager')->findOrFail($id);
        return view('project.update', compact('project', 'manager', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'manager_id' => [
                'required',
                'integer', // Tipe data harus integer
                'exists:manager,id', // Memastikan manager_id ada dalam tabel managers
            ],
            'name_project' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'status' => 'required',

        ]);

        $project = Project::findOrFail($id);
        $input = $request->all();
        $project->manager_id = $input['manager_id'];
        $project->name_project = $input['name_project'];
        $project->category_id = $input['category_id'];
        $project->description = $input['description'];
        $project->status = $input['status'];

        if ($request->file('image')) {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Mengunggah gambar baru dan mendapatkan path
            $imageName = $request->file('image')->store('images', 'public');

            // Hapus gambar lama (jika ada) dan simpan gambar baru
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $project->image = $imageName;
        }
        $project->save();
        Session::flash('success', 'Data project Updated Successfully.');
        return redirect()->route('project.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = $this->project->find($id);
        $project->delete();
        Session::flash('success', 'Data Project Successfully Deleted.');
        return redirect()->route('project.index');
    }
}
