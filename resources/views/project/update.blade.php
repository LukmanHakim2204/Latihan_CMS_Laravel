@extends('layouts.app')

@section('content')
    <div class="content">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Update Data Project</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Update Data Project</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Form Update Project</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('project.update', $project->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT') <!-- Menambahkan metode PUT untuk mengirimkan metode HTTP PUT -->

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="manager_id">Nama Manager</label>
                                        <select class="form-control select2" style="width: 100%;" name="manager_id"
                                            id="manager_id">
                                            <option value="{{ $project->manager_id }}" selected>
                                                {{ $project->manager->name }}</option>
                                            @foreach ($manager as $manager_id)
                                                <option value="{{ $manager_id->id }}">{{ $manager_id->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('manager_id')
                                            <div class="alert alert-danger" style="margin-top: 10px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="name_project">Nama Project</label>
                                        <input type="text" name="name_project" id="name_project" class="form-control"
                                            placeholder="Nama Project" value="{{ $project->name_project }}">
                                        @error('name_project')
                                            <div class="alert alert-danger" style="margin-top: 10px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id">Kategori</label>
                                        <select class="form-control select2" style="width: 100%;" name="category_id"
                                            id="category_id">
                                            <option value="{{ $project->category_id }}" selected>
                                                {{ $project->category->name }}</option>
                                            @foreach ($categories as $category_id)
                                                <option value="{{ $category_id->id }}">{{ $category_id->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <div class="alert alert-danger" style="margin-top: 10px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Deskripsi</label>
                                        <textarea name="description" id="description" rows="5" class="form-control" placeholder="Deskripsi Project"
                                            required>{{ $project->description }}</textarea>
                                        @error('description')
                                            <div class="alert alert-danger" style="margin-top: 10px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <input type="text" name="status" id="status" class="form-control"
                                            placeholder="Status" value="{{ $project->status }}">
                                        @error('status')
                                            <div class="alert alert-danger" style="margin-top: 10px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Gambar yang ditampilkan -->
                                <div class="form-group">
                                    <label for="current_image">Gambar</label>
                                    <img src="{{ asset('storage/' . $project->image) }}" alt="Gambar"
                                        style="max-width: 200px;">
                                </div>
                                <div class="form-group">
                                    <label for="image">Pilih Gambar Baru</label>
                                    <input type="file" name="image" id="image" accept="image/*">
                                    @error('image')
                                        <div class="alert alert-danger" style="margin-top: 10px;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection
