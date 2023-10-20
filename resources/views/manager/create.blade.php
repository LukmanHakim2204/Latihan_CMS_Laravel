@extends('layouts.app')

@section('content')
    <div class="content">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Data Manager</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Tambah Data Manager</li>
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
                                <h3 class="card-title">Tambah Data Manager</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('manager.store') }}" method="POST">
                                <div class="card-body">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nip" class="form-label">NIP</label>
                                        <input type="text" name="nip" id="nip" class="form-control"
                                            placeholder="Manager ID">
                                        @error('nip')
                                            <div class="alert alert-danger" style="margin-top: 10px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Nama Manager">
                                        @error('name')
                                            <div class="alert alert-danger" style="margin-top: 10px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" name="email" id="email" class="form-control"
                                            placeholder="Email">
                                        @error('email')
                                            <div class="alert alert-danger" style="margin-top: 10px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
