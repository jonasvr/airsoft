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
                        <td><a href="{{route('getMember',['id'=>$user['id']])}}"> {{$user->name}} </a></td>
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

            -- approvel input weapons & profile --
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                <tr>
                    <th>eigenaar</th>
                    <th>name</th>
                    <th>omschrijving</th>
                    <th>classe</th>
                    <th>subclasse</th>
                    <th><span class="fa fa-check"></span></th>
                    <th><span class="fa fa-close"></span></th>
                </tr>
                @foreach($geweren as $geweer)
                    <tr>
                        <td><a href="{{route('getMember',['id'=>$geweer->user_id])}}"> {{$geweer->user->name}} </a></td>
                        <td>{{$geweer->name}}</td>
                        <td>{{$geweer->omschrijving}}</td>
                        <td>{{$geweer->classe->type}}</td>
                        <td>{{$geweer->subclasse->type}}</td>
                        <td><a href="{{route('approve-armor', ['id' => $geweer->id, 'approve'=>1])}}"><span class="fa fa-check"></span></a></td>
                        <td><a href="{{route('approve-armor', ['id' => $geweer->id, 'approve'=>2])}}"><span class="fa fa-close"></span></a></td>
                        <td><a href="{{route('edit-armor', [$geweer->id])}}"><span class="fa fa-pencil"></span></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
{{--{{dd($geweren)}}--}}
            -- approvel input weapons & profile --
        </div>
    </div>
@endsection