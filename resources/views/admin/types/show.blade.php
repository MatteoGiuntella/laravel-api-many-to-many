@extends('layouts.app')

@section('page-title', 'show')

@section('main-content')

    <div class=" container ">

        <div class="row my-4 ">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <ul>
                            <li>
                                {{ $type->title }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

    </div>


@endsection
