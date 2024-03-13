@extends('layouts.app')

@section('page-title', 'update')

@section('main-content')

<div class=" container ">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.types.update', ['type' => $type->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
            <input value="{{ old('title', $type->title) }}" type="text" class="form-control" id="title" name="title"
                placeholder="Insert title..." maxlength="64" required>
        </div>

        <div>
            <button type="submit" class="btn btn-success w-100">
                Fix
            </button>
        </div>


    </form>

</div>

@endsection