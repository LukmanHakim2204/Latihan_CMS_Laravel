@extends('layouts.app')

@section('content')
    <div class="content">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Update Data Categori</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Update Data Categori</li>
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
                                <h3 class="card-title">Update Data Categori</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('categories.update', $category->id) }}" method="post">
                                <div class="card-body">
                                    @method('PUT')
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name Category</label>
                                        <input type="text" value="{{ $category->name }}" name="name" id="name"
                                            class="form-control" placeholder="Nama Categori">
                                        @error('name')
                                            <div class="alert alert-danger" style="margin-top: 10px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary mr-1">Submit</button>
                                        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
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
