@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="d-flex justify-content-center">Project</h1>

        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach ($projects as $project)
                <div class="col">
                    <div class="card">
                        @if ($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" class="card-img-top"
                                alt="{{ $project->name_project }}" style="width: 540px; height: 300px;">
                        @endif
                        <div class="card-body">
                            <strong style="font-size: 30px">{{ $project->name_project }}</strong>
                            <br>
                            <p>Category: {{ $project->category->name ?? '-' }}</p>
                            <p>Manager: {{ $project->manager->name }}</p>
                            <p>Published on: {{ $project->created_at->format('F d, Y H:i:s') }}</p>
                            <p class="card-text">
                                {{ \Str::limit(htmlspecialchars_decode($project->description), 50) }}
                            </p>
                        </div>
                        @if (strlen(strip_tags(htmlspecialchars_decode($project->description))) > 50)
                            <div class="card-footer d-flex justify-content-end">
                                <a href="{{ route('projectShow', $project->id) }}" class="btn btn-primary">Read
                                    More</a>
                            </div>
                        @endif

                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            Showing {{ $projects->firstItem() }} of {{ $projects->lastItem() }} to {{ $projects->total() }} entries
        </div>
        <div class="d-flex justify-content-center">
            {{ $projects->links() }}
        </div>
    </div>
@endsection
