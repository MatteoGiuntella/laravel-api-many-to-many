@extends('layouts.app')

@section('page-title', 'show')

@section('main-content')

    <div class=" container ">
            {{-- @dd( $project->type): --}}
        <div class="row my-4 ">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <ul>
                            <li>
                                {{ $project->title }}
                            </li>
                            <li>
                                {{ $project->description }}
                            </li>
                            {{-- @if($project->type->title == null) --}}
                            <li>
                                {{ $project->date }}
                            </li>
                            <li>
                                {{ $project->type->title }}
                            </li>
                            <div class="px-2">
                                @forelse ($project->technologies as $technology)
                                    <span class="badge text-bg-primary">{{ $technology->title }}</span>
                                @empty
                                    <p>-</p>
                                @endforelse
                            </div>
                            <li>
                                {{ $project->url }}
                            </li>
                        </ul>
                    </div>
                </div>
                
            </div>

        </div>

    </div>


@endsection
