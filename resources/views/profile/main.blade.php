@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row jumbotron">
            <div class="row">
                <div class="col-md-3">
                    <h2>info</h2>
                </div>
                <div class="col-md-offset-8 col-md-1">
                    @if($user->id == Auth::id())
                    <a href="{{route('editprofile')}}">
                        <i class="fa fa-cog text-right" aria-hidden="true"></i>
                    </a>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                    <img src="{{asset('img/no-pic.png')}}" alt="">
            </div>
            <div class="col-md-8">
                naam: {{$user->name}}<br>
                nickname: {{$user->nickname}} <br>
                callsign:{{$user->callsign}} <br>
                phonenumber:{{$user->gsm}} <br>
                birthday: {{$user->birthday}}<br>
            </div>
        </div>
        <div class="row jumbotron">
            <div class="row">
                <div class="col-md-3">
                    <h2>materiaal</h2>
                </div>
                <div class="col-md-offset-8 col-md-1">
                    @if($user->id == Auth::id())

                    <a href="{{route('addMaterial')}}">
                        <i class="fa fa-plus text-right" aria-hidden="true"></i>
                    </a>
                    @endif
                </div>
            </div>
            @foreach($geweren as $index => $geweer)
            <div class="col-md-4 text-center margin-bottom-10">
                <img src="{{asset("img/gun.jpg")}}" alt=""><br>
                naam: {{$geweer->name}} <br>
                omschrijving: {{$geweer->omschrijving}} <br>
                classe: {{$geweer->type}}
            </div>
            @endforeach
        </div>
    </div>

@endsection
