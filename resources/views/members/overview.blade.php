@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row jumbotron">
            <div class="row">
                <div class="col-md-3">
                    <h2>Members</h2>
                </div>
            </div>
            @foreach($users as $index => $user)
                <a href="{{route('getMember',['id'=>$user['id']])}}" >
                <div class="col-md-4 text-center margin-bottom-10">
                    @if( $user->img != null)
                        <img style="width: 255px;" src="{{asset('pro-pics/'.$user->img)}}" alt="">
                    @else
                        <img style="width: 255px;" src="{{asset('img/no-pic.png')}}" alt="">
                    @endif

                    <br>
                    naam: {{ $user->name }} <br>
                    nickname: {{$user->nickname}} <br>
                    callsign: {{$user->callsign}} <br>
                    function:
                </div>
                </a>
            @endforeach
        </div>
    </div>

@endsection
