@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item active"> <a href="/home">Dashboard v1</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box for User -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $managerCount }}</h3>
                            <p>manager</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i> <!-- Ikon untuk Manager -->
                        </div>
                        <a href="{{ route('manager.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box for Category -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $categoryCount }}</h3> <!-- Menampilkan jumlah kategori -->
                            <p>Category</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-list"></i> <!-- Ikon untuk Category -->
                        </div>
                        <a href="{{ route('categories.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box for Category -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>{{ $projectCount }}</h3> <!-- Menampilkan jumlah Project-->
                            <p>Project</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-briefcase"></i> <!-- Ikon untuk Category -->
                        </div>
                        <a href="{{ route('project.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- ./col -->
            </div>
            <!-- /.row -->
        </div>
    </section>
    <!-- /.content -->
@endsection
