@extends('layouts.app')

@section('content')
    <div class="content">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Project</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Data Project</li>
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
                        <a href="{{ route('project.create') }}" class="btn btn-primary mb-3">Create Data</a>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Table Listing project</h3>
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
                                <form method="GET" action="{{ route('project.index') }}" class="mb-3">
                                    <div class="form-group">
                                        <input type="text" name="search" class="form-control" placeholder="Search News">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </form>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap" border="1">
                                        <!-- Tambahkan border="1" di sini -->
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Manager</th>
                                                <th>Nama Project</th>
                                                <th>Categori</th>
                                                <th>Deskripsi</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($projects as $index => $project)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $project->manager->name }}</td>
                                                    <td>{{ $project->name_project }}</td>
                                                    <td>{{ $project->category->name }}</td>
                                                    <td>{{ strlen($project->description) > 20 ? substr($project->description, 0, 20) . '...' : $project->description }}
                                                    </td>
                                                    <td>{{ $project->status }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="{{ route('project.show', $project->id) }}"
                                                                class="btn btn-secondary mr-2">Details</a>
                                                            <a href="{{ route('project.edit', $project->id) }}"
                                                                class="btn btn-success mr-2">
                                                                <i class="fas fa-pencil-alt"></i> <!-- Ikon Pencil -->
                                                            </a>
                                                            <form method="POST"
                                                                action="{{ route('project.destroy', $project->id) }}">
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
                                {{ $projects->firstItem() }}
                                to
                                {{ $projects->lastItem() }}
                                of
                                {{ $projects->total() }}
                                entries
                            </div>
                        </div>
                        <div class="d-flex flex-row-reverse">
                            {{ $projects->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
