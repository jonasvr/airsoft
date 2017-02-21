@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                <tr>
                    <th>name</th>
                    <th>email</th>
                    <th>nickname</th>
                    <th>birthday</th>
                    <th>gsm</th>
                    <th>callsign</th>
                    <th>AAB_Lidnummer</th>
                    <th>aansluiting</th>
                    <th>edit</th>
                </tr>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->nickname}}</td>
                        <td>{{$user->birthday}}</td>
                        <td>+32{{$user->gsm}}</td>
                        <td>{{$user->callsign}}</td>
                        <td>{{$user->AAB_Lidnummer}}</td>
                        <td>{{$user->aansluiting}}</td>
                        <td><a href="{{route('editprofile', [$user->id])}}"><span class="fa fa-pencil"></span></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection