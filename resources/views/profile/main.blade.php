@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row jumbotron">
            <div class="row">
                <div class="col-md-3">
                    <h2>
                    @if($user->id == Auth::id())
                        <a href="{{route('editprofile',['id'=>$user['id']])}}">
                            <i class="fa fa-cog text-right" aria-hidden="true"></i>
                        </a>
                    @endif
                    Info</h2>

                    <img class="img-responsive" src="{{asset('img/no-pic.png')}}" alt="">
                    <label for="name">naam:</label> <p id="name">{{$user->name}}</p>
                    <label for="nickname">nickname:</label> <p id="nickname">{{$user->nickname}}</p>
                    <label for="callsign">callsign:</label> <p id="callsign">{{$user->callsign}}</p>
                    <label for="gsm">phonenumber:</label> <p id="gsm">{{$user->gsm}}</p>
                    <label for="birthday">birthday:</label> <p id="birthday">{{$user->birthday}}</p>
                </div>
                <div class="col-md-offset-1 col-md-7">
                    <h2>
                        @if($user->id == Auth::id())
                            <a href="{{route('addMaterial')}}"> <span class="fa fa-plus"></span></a>
                        @endif
                        Armory
                    </h2>
                    <div class="row">
                        <div class="col-md-4 margin-bottom-10">
                            <a href="{{route('specific', ['id' => 1])}}">
                                <img class="img-responsive" src="{{asset('img/gear-logo/helmet.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="col-md-4 margin-bottom-10">
                            <a href="{{route('specific', ['id' => 2])}}">
                                <img class="img-responsive" src="{{asset('img/gear-logo/body.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="col-md-4 margin-bottom-10">
                            <a href="{{route('specific', ['id' => 3])}}">
                                <img class="img-responsive" src="{{asset('img/gear-logo/weapon.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="col-md-offset-2 col-md-4 margin-bottom-10">
                            <a href="{{route('specific', ['id' => 4])}}">
                                <img class="img-responsive" src="{{asset('img/no-pic.png')}}" alt="">
                            </a>
                        </div>
                        <div class="col-md-4 margin-bottom-10">
                            <a href="{{route('specific', ['id' => 5])}}">
                                <img class="img-responsive" src="{{asset('img/no-pic.png')}}" alt="">
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
