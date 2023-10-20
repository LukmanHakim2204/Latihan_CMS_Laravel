@extends('layouts.app')

@section('content')
    <div class="content">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Categori</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Data Categori</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Create Data</a>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Table Listing Categori</h3>
                                {{-- @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif --}}
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                            </div>
                            <div class="card-body">
                                <form method="GET" action="{{ route('categories.index') }}" class="mb-3">
                                    <div class="form-group">
                                        <input type="text" name="search" class="form-control" placeholder="Search News">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </form>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th class="col-1">No</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $category)
                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td>{{ $category->name }}</td>
                                                    <td>
                                                        <form action="{{ route('categories.destroy', $category->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a class="btn btn-primary"
                                                                href="{{ route('categories.edit', $category->id) }}">Edit</a>
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <div>
                                Showing
                                {{ $categories->firstItem() }}
                                of
                                {{ $categories->lastItem() }}
                                to
                                {{ $categories->total() }}
                                entries
                            </div>
                        </div>
                        <div class="d-flex flex-row-reverse">
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
