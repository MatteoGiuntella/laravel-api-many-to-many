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

    <form action="{{ route('admin.projects.update', ['project' => $project->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
            <input value="{{ old('title', $project->title) }}" type="text" class="form-control" id="title" name="title"
                placeholder="Insert title..." maxlength="64" required>
        </div>

        <div class="mb-3">
            <label for="url" class="form-label">Url <span class="text-danger">*</span></label>
            <input value="{{ old('url', $project->url) }}" type="text" class="form-control" id="url" name="url"
                placeholder="Insert url..." maxlength="1024" required>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input value="{{ old('sale_date', $project->date) }}" type="date" class="form-control" id="sale_date" name="date"
                placeholder="Insert date">
        </div>


        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea  class="form-control" id="description" name="description" rows="3"
                placeholder="Insert description...">{{ old('description', $project->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="type_id" class="form-label">Type</label>
            <select name="type_id" id="type_id" class="form-select">
                <option
                    {{ old('type_id', $project->type_id) == null ? 'selected' : '' }}
                    value="">
                    Select type
                </option>
                @foreach ($types as $type)
                <option
                    {{ old('type_id', $project->type_id) == $type->id ? 'selected' : '' }}
                    value="{{ $type->id }}">
                    {{ $type->title }}
                </option>
            @endforeach
            </select>
        </div>
        <div>
            @foreach ($technologies as $technology)
                <div class="form-check form-check-inline">
                    <input
                        {{-- Se c'è l'old, vuol dire che c'è stato un errore --}}
                        @if ($errors->any())
                            {{-- Faccio le verifiche sull'old --}}
                            {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}
                        @else
                            {{-- Faccio le verifiche sulla collezione --}}
                            {{ $project->technologies->contains($technology->id) ? 'checked' : '' }}
                        @endif
                        class="form-check-input"
                        type="checkbox"
                        id="technology-{{ $technology->id }}"
                        name="technologys[]"
                        value="{{ $technology->id }}">
                    <label class="form-check-label" for="technology-{{ $technology->id }}">{{ $technology->title }}</label>
                </div>
            @endforeach
        </div>
      
      
        <div>
            <button type="submit" class="btn btn-success w-100">
                Fix
            </button>
        </div>


    </form>

</div>

@endsection