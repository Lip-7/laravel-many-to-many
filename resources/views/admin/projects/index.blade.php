@extends('layouts.admin')

@section('content')
<div class="text-end">
    <a class="btn btn-success" href="{{ route('admin.projects.create') }}">Crea nuovo post</a>
</div>
    <div class="container projectsIndex">
        <div class="row text-center py-5">
            @foreach ($projects as $project)
                <div class="col-lg-4 position-relative">
                    <img class=""
                        src="/images/{{$project->framework->name . '.png'}}"
                        alt="{{$project->framework}}" width="140" height="140">
                    <h2>{{ $project->name }}</h2>
                    <p>{{ $project->description }}</p>
                    <p><a class="btn btn-warning" href="{{route('admin.projects.show', $project)}}" role="button">Lunch Project</a></p>
                    <div class="buttons position-absolute d-flex justify-center align-items-center">
                        <a href="{{route('admin.projects.edit', $project)}}"><i class="fa-solid fa-pencil text-success"></i></a>
                        <form method="POST" action="{{route('admin.projects.destroy', $project)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn delete-button" data-item-title="{{$project->name}}"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="projectsIndexPagination px-5">
        {{ $projects->links('vendor.pagination.bootstrap-5') }}
    </div>
    @include('partials.modal-delete')
@endsection
