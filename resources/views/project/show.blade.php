@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="card">

                    @if ($project->image)
                        <img src="{{ asset('storage/' . $project->image) }}" class="card-img-top"
                            alt="{{ $project->name_project }}">
                    @endif
                    <div class="card-body">
                        <div class="card-header">
                            <h1 class="d-flex justify-content-center">
                                <strong>{{ $project->name_project }}</strong>
                            </h1>
                            <p>Category: {{ optional($project->category)->name ?? '-' }}</p>

                            <p>Author: {{ $project->manager->name }}</p>
                            <p>Published on: {{ $project->created_at->format('F d, Y H:i:s') }}</p>
                        </div>
                        <p class="card-text">{!! htmlspecialchars_decode($project->description) !!}</p>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ url()->previous() }}" class="btn btn-secondary d-flex justify-content-around">Back</a>

    </div>
@endsection
