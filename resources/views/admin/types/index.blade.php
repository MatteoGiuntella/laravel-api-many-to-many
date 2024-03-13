@extends('layouts.app')

@section('page-title', 'Homepage')

@section('main-content')


    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        My type
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
                                @foreach ($types as $type)
                                    <tr>
                                        <th scope="row">{{ $type->id }}</th>
                                        <td>{{ $type->title }}</td>
                                        <td>
                                            <a href="{{ route('admin.types.show', ['type' => $type->slug]) }}"
                                                class="btn btn-xs btn-primary">
                                                Show
                                            </a>
                                            <a href="{{ route('admin.types.update', ['type' => $type->id]) }}"
                                                class="btn btn-xs btn-primary">
                                                Update
                                            </a>
                                            <form onsubmit="return confirm('Do you want delete this type?');"
                                                class="d-inline-block"
                                                action="{{ route('admin.types.destroy', ['type' => $type->id]) }}"
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
