<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Str;
use App\Models\Category;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::paginate(5);

        $search = $request->input('search');

        $categories = Category::where('name', 'like', "%$search%")
            ->paginate(5);

        return view('categories.index', compact('categories'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        if (Gate::allows('manage-categories')) {
            // Izinkan admin untuk membuat kategori
            return view('categories.create');
        } else {
            // Izin ditolak, mungkin ingin menampilkan pesan kesalahan atau mengarahkan pengguna
            return redirect()->route('home')->with('error', 'Anda tidak memiliki izin untuk membuat kategori.');
        }
    }


    public function store(CategoryRequest $request)
    {
        $validator = Validator::make($request->all(), $request->rules());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $category = new Category();
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name'));
        $category->save();

        // Set pesan flash untuk operasi penambahan kategori
        Session::flash('success', 'Category Successfully Added');

        return redirect()->route('categories.index');
    }
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('categories.update', compact('category'));
    }
    public function update(CategoryRequest $request, Category $category)
    {
        $validator = Validator::make($request->all(), $request->rules());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name'));
        $category->save();

        // Set pesan flash untuk operasi pembaruan kategori
        Session::flash('success', 'Category Successfully Updated');

        return redirect()->route('categories.index');
    }
    public function destroy(Category $category)
    {
        $category->delete();

        Session::flash('success', 'Category Successfully Deleted.');

        return redirect()->route('categories.index');
    }
}
