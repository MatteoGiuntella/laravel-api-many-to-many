@extends('layouts.app')

@section('page-title', 'Homepage')

@section('main-content')


    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        My technologies
                    </h1>

                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($technologies as $technology)
                                    <tr>
                                        <th scope="row">{{ $technology->id }}</th>
                                        <td>{{ $technology->title }}</td>
                                        <td>
                                            <a href="{{ route('admin.technologies.show', ['technology' => $technology->slug]) }}"
                                                class="btn btn-xs btn-primary">
                                                Show
                                            </a>
                                            <a href="{{ route('admin.technologies.update', ['technology' => $technology->id]) }}"
                                                class="btn btn-xs btn-primary">
                                                Update
                                            </a>
                                            <form onsubmit="return confirm('Do you want delete this technology?');"
                                                class="d-inline-block"
                                                action="{{ route('admin.technologies.destroy', ['technology' => $technology->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button technology="submit" class="btn btn-danger">
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
