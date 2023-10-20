@extends('layouts.app')

@section('content')
    <div class="content">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Data Project</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Tambah Data Project</li>
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
                                <h3 class="card-title">Form Tambah Project</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="manager_id">Nama Manager</label>
                                        <select class="form-control select2" style="width: 100%;" name="manager_id"
                                            id="manager_id">
                                            <option disabled selected>Pilih Nama Manager</option>
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
                                            placeholder="Nama Project">
                                        @error('name_project')
                                            <div class="alert alert-danger" style="margin-top: 10px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id">Kategori</label>
                                        <select class="form-control select2" style="width: 100%;" name="category_id"
                                            id="category_id">
                                            <option value="">Pilih Kategori</option>
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
                                        <textarea name="description" id="description" rows="5" class="form-control" placeholder="Deskripsi Project"></textarea>
                                        @error('description')
                                            <div class="alert alert-danger" style="margin-top: 10px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <input type="text" name="status" id="status" class="form-control"
                                            placeholder="Status">
                                        @error('status')
                                            <div class="alert alert-danger" style="margin-top: 10px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Gambar</label>
                                        <br>
                                        <input type="file" name="image" id="image" accept="image/*" required>
                                        @error('image')
                                            <div class="alert alert-danger" style="margin-top: 10px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
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
