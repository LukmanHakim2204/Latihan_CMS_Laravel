<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\ManagerRequest;
use Illuminate\Support\Facades\Session;

class ManagerController extends Controller
{
    protected $manager;
    /**
     * Display a listing of the resource.
     */
    public function __construct(Manager $manager)
    {
        $this->manager = $manager;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $managers = Manager::paginate(5);
        $search = $request->input('search');

        $managers = Manager::where('name', 'like', "%$search%")
            ->paginate(5);

        return view('manager.index', compact('managers'))->with('i', ($managers->currentPage() - 1) * 2);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Gate::allows('manage-managers')) {
            // Izinkan admin untuk membuat berita/ Ambil semua kategori
            return view('manager.create');
        } else {
            // Izin ditolak, mungkin ingin menampilkan pesan kesalahan atau mengarahkan pengguna
            return redirect()->route('home')->with('error', 'Anda tidak memiliki izin untuk membuat berita.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ManagerRequest $request)
    {
        $input = $request->all();
        $manager = new Manager();
        $manager->nip = $input['nip'];
        $manager->name = $input['name'];
        $manager->email = $input['email'];
        $manager->save();
        // Set pesan flash untuk operasi penambahan manager
        Session::flash('success', 'Data Manager Added Successfully.');
        return redirect()->route('manager.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Manager $manager)
    {
        return view('manager.show', compact('manager'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $manager = $this->manager->find($id);
        return view('manager.update', compact('manager'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $input = $request->all();
        $manager = $this->manager->find($id);
        $manager->name = $input['name'];
        $manager->email = $input['email'];
        $manager->save();
        // Set pesan flash untuk operasi Update manager
        Session::flash('success', 'Data Manager Updated Successfully.');
        return redirect()->route('manager.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $manager = $this->manager->find($id);
        $manager->delete();
        // Set pesan flash untuk operasi Hapus Manager
        session()->flash('success', 'Data Manager Successfully Deleted.');
        return redirect()->route('manager.index');
    }
}
