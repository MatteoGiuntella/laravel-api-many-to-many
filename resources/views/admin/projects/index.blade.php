@extends('layouts.app')

@section('page-title', 'Homepage')

@section('main-content')


    <div class="row">
        <div class="col">
            {{-- @dd($projects) --}}
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        My Project
                    </h1>

                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Technology</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $project)
                                    <tr>
                                        <th scope="row">{{ $project->id }}</th>
                                        <td>{{ $project->title }}</td>
                                        <td>{{ $project->description }}</td>
                                        <td>{{ $project->date }}</td>
                                         @if($project->type != null)

                                        <td>{{ $project->type->title }}</td>
                                        @else
                                        <td>-</td>
                                        @endif
                                        <td class="px-2">
                                            @forelse ($project->technologies as $technology)
                                                <span class="badge text-bg-primary">{{ $technology->title }}</span>
                                            @empty
                                                <p>-</p>
                                            @endforelse
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.projects.show', ['project' => $project->slug]) }}"
                                                class="btn btn-xs btn-primary my-1 ">
                                                Show
                                            </a>
                                            <a href="{{ route('admin.projects.edit', ['project' => $project->id]) }}"
                                                class="btn btn-xs btn-success my-1 ">
                                                Update
                                            </a>
                                            <form onsubmit="return confirm('Do you want delete this project?');"
                                                class="d-inline-block my-1 "
                                                action="{{ route('admin.projects.destroy', ['project' => $project->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
