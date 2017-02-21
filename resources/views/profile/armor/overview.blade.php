@extends('layouts.app')

@section('content')
    <div class="container">
        {{--{{dd($armor)}}--}}
        <div class="row">
            @foreach($armor as $arm)
                <div class="col-md-4">
                    {{$arm->name}} {{$arm->id}} <br>
                    {{ $arm->type }} <br>
                    <img class="img-responsive" src="/{{ $arm->img }}" alt="">

                </div>
            @endforeach
        </div>
    </div>

@endsection
