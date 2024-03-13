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


    <form action="{{ route('admin.types.store') }}" method="POST">
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
            <label for="date" class="form-label">Date</label>
            <input value="{{ old('date') }}" type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" placeholder="Insert date">
            @error('date')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

    
        <div>
            <button type="submit" class="btn btn-success w-100">
                Add
            </button>
        </div>


    </form>


@endsection
