@extends('layouts.app')

@section('content')
    <div class="container">
        {{--{{dd($armor)}}--}}
        <div class="row">
            @foreach($armor as $arm)
                <div class="col-md-4">
                    {{$arm->name}} {{$arm->id}} <br>
                    {{ $arm->type }} <br>
                    @if( $arm->img != null)
                        <img style="width: 255px;" src="/armor-pics/{{ $arm->img }}" alt="">
                    @else
                        <img style="width: 255px;" src="{{asset('/img/no-pic.png')}}" alt="">
                    @endif
                </div>
            @endforeach
        </div>
    </div>

@endsection
