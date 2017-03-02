@extends('layouts.app')

@section('content')
    <div class="container">
        @if(count($notifications) && $user->id == Auth::id())
            <div class="row jumbotron">
                <table class="table table-striped">
                    <h3>Not approved guns</h3>
                    <tbody>
                    <tr>
                        <th>name</th>
                        <th>omschrijving</th>
                        <th>classe</th>
                        <th>subclasse</th>
                        <th><span class="fa fa-pencil"></span></th>
                    </tr>
                    @foreach($notifications as $notification)
                        <tr>
                            <td>{{$notification->name}}</td>
                            <td>{{$notification->omschrijving}}</td>
                            <td>{{$notification->classe->type}}</td>
                            <td>{{$notification->subclasse->type}}</td>
                            <td><a href="{{route('edit-armor', [$notification->id])}}"><span class="fa fa-pencil"></span></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        @endif
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
                    @if( $user->img != null)
                        <img class="img-responsive" src="{{asset('pro-pics/'.$user->img)}}" alt="">
                    @else
                        <img class="img-responsive" src="{{asset('img/no-pic.png')}}" alt="">
                    @endif
                        <label for="name">naam:</label> <p id="name">{{$user->name}}</p>
                    <label for="nickname">nickname:</label> <p id="nickname">{{$user->nickname}}</p>
                    <label for="callsign">callsign:</label> <p id="callsign">{{$user->callsign}}</p>
                    <label for="status">status:</label> <p id="status">{{$user->Status[0]->status}}</p>
                    <label for="gsm">phonenumber:</label> <p id="gsm">+32{{$user->gsm}}</p>
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
                            <a href="{{route('specific', ['id' => 1,'user_id' => $user->id])}}">
                                <img class="img-responsive" src="{{asset('img/gear-logo/helmet.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="col-md-4 margin-bottom-10">
                            <a href="{{route('specific', ['id' => 2,'user_id' => $user->id])}}">
                                <img class="img-responsive" src="{{asset('img/gear-logo/body.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="col-md-4 margin-bottom-10">
                            <a href="{{route('specific', ['id' => 3,'user_id' => $user->id])}}">
                                <img class="img-responsive" src="{{asset('img/gear-logo/weapon.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="col-md-offset-2 col-md-4 margin-bottom-10">
                            <a href="{{route('specific', ['id' => 4,'user_id' => $user->id])}}">
                                <img class="img-responsive" src="{{asset('img/no-pic.png')}}" alt="">
                            </a>
                        </div>
                        <div class="col-md-4 margin-bottom-10">
                            <a href="{{route('specific', ['id' => 5,'user_id' => $user->id])}}">
                                <img class="img-responsive" src="{{asset('img/no-pic.png')}}" alt="">
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
