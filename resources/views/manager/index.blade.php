@extends('layouts.app')

@section('content')
    <div class="content">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Manager</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Data Manager</li>
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
                        <a href="{{ route('manager.create') }}" class="btn btn-primary mb-3">Create Data</a>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Table Listing manager</h3>
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <form method="GET" action="{{ route('manager.index') }}" class="mb-3">
                                    <div class="form-group">
                                        <input type="text" name="search" class="form-control" placeholder="Search News">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </form>
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>NIP</th>
                                            <th>Nama manager</th>
                                            <th>Email</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($managers as $index => $manager)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $manager->nip }}</td>
                                            <td>{{ $manager->name }}</td>
                                            <td>{{ $manager->email }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('manager.edit', $manager->id) }}"
                                                        class="btn btn-success mr-2">
                                                        <i class="fas fa-pencil-alt"></i> <!-- Ikon Pencil -->
                                                    </a>
                                                    <form method="POST"
                                                        action="{{ route('manager.destroy', $manager->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="fas fa-trash-alt"></i> <!-- Ikon Trash -->
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <div>
                            Showing
                            {{ $managers->firstItem() }}
                            of
                            {{ $managers->lastItem() }}
                            to
                            {{ $managers->total() }}
                            entries
                        </div>
                    </div>
                    <div class="d-flex flex-row-reverse">
                        {{ $managers->links() }}
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
