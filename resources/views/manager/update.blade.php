@extends('layouts.app')

@section('content')
    <div class="content">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Update Data Manager</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Update Data Manager</li>
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
                                <h3 class="card-title">Update Data Manager</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('manager.update', $manager->id) }}" method="post">
                                <div class="card-body">
                                    @method('PUT')
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name Nama</label>
                                        <input type="text" value="{{ $manager->name }}" name="name" id="name"
                                            class="form-control" placeholder="Name manager">
                                        @error('name')
                                            <div class="alert alert-danger" style="margin-top: 10px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" value="{{ $manager->email }}" name="email" id="email"
                                            class="form-control" placeholder="Email">
                                        @error('email')
                                            <div class="alert alert-danger" style="margin-top: 10px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary mr-1">Submit</button>
                                            <a href="{{ route('manager.index') }}" class="btn btn-secondary">Cancel</a>
                                        </div>
                                    </div>
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
