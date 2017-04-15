@extends('layouts.app')

@section('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @if (Auth::check())
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/contact') }}">Contact</a>
                @endif
            </div>
        @endif

        <div class="content">
            <div class="row">
                <div class="col-md- col-md-1">

                </div>
            </div>
        </div>
    </div>
@endsection
