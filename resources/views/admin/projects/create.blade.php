@extends('layouts.app')

@section('page-title', 'Create')

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


    <form action="{{ route('admin.projects.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label  for="title" class="form-label " >add title</label>
            <input value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" type="text" id="title" name="title" maxlength="64">
            @error('title')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label  for="url" class="form-label">url <span class="text-danger">*</span></label>
            <input value="{{ old('url') }}" type="text" class="form-control @error('url') is-invalid @enderror" id="url" name="url" placeholder="Insert url..."
                maxlength="1024" required>
                @error('url')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input value="{{ old('date') }}" type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" placeholder="Insert date">
            @error('date')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="type_id" class="form-label">Type</label>
            <select name="type_id" id="type_id" class="form-select">
                <option
                    value=""
                    {{ old('type_id') == null ? 'selected' : '' }}>
                    Add Type
                </option>
                @foreach ($types as $type)
                    <option
                        value="{{ $type->id }}"
                        {{ old('type_id') == $type->id ? 'selected' : '' }}>
                        {{ $type->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea  class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" placeholder="Insert description...">{{ old('description') }}</textarea>
            @error('description')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Technology</label>

            <div>
                @foreach ($technologies as $technology)
                    <div class="form-check form-check-inline">
                        <input
                            {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}
                            class="form-check-input"
                            type="checkbox"
                            id="technology-{{ $technology->id }}"
                            name="technologies[]"
                            value="{{ $technology->id }}">
                        <label class="form-check-label" for="technology-{{ $technology->id }}">{{ $technology->title }}</label>
                    </div>
                @endforeach
            </div>
        </div>
    
        <div>
            <button type="submit" class="btn btn-success w-100">
                Add
            </button>
        </div>


    </form>


@endsection
