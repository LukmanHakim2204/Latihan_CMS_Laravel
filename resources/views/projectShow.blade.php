@extends('layouts.script')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="card">

                @foreach ($projects as $project)
                    @if ($project->image)
                        <img src="{{ asset('storage/' . $project->image) }}" class="card-img-top"
                            alt="{{ $project->name_project }}" style="width: 100%; height: auto;">
                    @endif

                    <div class="card-body">
                        <strong class="d-flex justify-content-center"
                            style="font-size:30px">{{ $project->name_project }}</strong>
                        <div class="card-header">
                            <p>Category: {{ $project->category->name }}</p>
                            <p>Manager: {{ $project->manager->name }}</p>
                            <p>Published on: {{ $project->created_at->format('F d, Y H:i:s') }}</p>
                        </div>
                        <p class="card-text custom-font">{!! htmlspecialchars_decode($project->description) !!}</p>
                    </div>
                @endforeach

                <!-- Tampilkan tombol navigasi paginasi -->
                <div class="pagination">
                    {{ $projects->links() }}
                </div>
            </div>
        </div>
    </div>
    <a href="{{ url()->previous() }}" class="btn btn-secondary d-flex justify-content-around">Back</a>
</div>
