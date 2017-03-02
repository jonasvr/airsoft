@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row jumbotron">
            <div class="row">
                <div class="col-md-3">
                    <h2>info</h2>
                </div>
            </div>
            <div class="col-md-4">
                <a href="#">
                    <img class="img-responsive" src="{{asset('pro-pics/'.$user->img)}}" alt="">
                </a>
            </div>
            <div class="col-md-8">

                {{Form::open(array('url' => route('postedit'), 'method' => 'POST', "class" => "form-horizontal", "files"=>true))}}
                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                    {{Form::label('name', 'Naam',["class" => "control-label"])}}
                    <div class="col-md-offset-1 col-md-11">
                        {{Form::text('name',$user->name,["class" => "form-control"])}}
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                 <div class="form-group {{ $errors->has('nickname') ? ' has-error' : '' }}">
                     {{Form::label('nickname', 'Nickname',["class" => "control-label"])}}
                     <div class="col-md-offset-1 col-md-11">
                     {{Form::text('nickname',$user->nickname,["class" => "form-control"])}}
                         @if ($errors->has('nickname'))
                             <span class="help-block">
                                <strong>{{ $errors->first('nickname') }}</strong>
                            </span>
                         @endif
                     </div>
                 </div>
                <div class="form-group {{ $errors->has('callsign') ? ' has-error' : '' }}">
                    {{Form::label('callsign', 'Callsign',["class" => "control-label"])}}
                    <div class="col-md-offset-1 col-md-11">
                    {{Form::text('callsign',$user->callsign,["class" => "form-control"])}}
                        @if ($errors->has('callsign'))
                            <span class="help-block">
                                <strong>{{ $errors->first('callsign') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('birthday') ? ' has-error' : '' }}">
                    {{Form::label('birthday', 'Birthday',["class" => "control-label"])}}
                    <div name="birthday" class="col-md-offset-1 col-md-11">
                        {!! Form::date('birthday',$user->birthday ,['class' => 'form-control']) !!}
                        @if ($errors->has('birthday'))
                            <span class="help-block">
                                <strong>{{ $errors->first('birthday') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('gsm') ? ' has-error' : '' }}">
                    {{Form::label('gsm', 'gsm',["class" => "control-label"])}}
                    <div class="col-md-offset-1 col-md-11">
                        {{Form::text('gsm',$user->gsm,["class" => "form-control"])}}
                        @if ($errors->has('gsm'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('gsm') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('img') ? ' has-error' : '' }}">
                    {{Form::label('img', 'img',["class" => "control-label"])}}
                    <div class="col-md-offset-1 col-md-11">
                        {{Form::file('img',["class" => "form-control"])}}
                        @if ($errors->has('img'))
                            <span class="help-block">
                                <strong>{{ $errors->first('img') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                @if(Auth::user()->role == 'admin')
                    <div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}">
                        {{Form::label('classe_id', 'status',["class" => "control-label"])}}
                        <div class="col-md-offset-1 col-md-11">
                            {{Form::select('status', $status,$user->status,["class" => "form-control"])}}
                            @if ($errors->has('status'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                        <div class="form-group {{ $errors->has('aansluiting') ? ' has-error' : '' }}">
                            {{Form::label('aansluiting', 'aansluiting',["class" => "control-label"])}}
                            <div class="col-md-offset-1 col-md-11">
                                {{Form::text('aansluiting',$user->aansluiting,["class" => "form-control"])}}
                                @if ($errors->has('aansluiting'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('aansluiting') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('AAB_Lidnummer') ? ' has-error' : '' }}">
                            {{Form::label('AAB_Lidnummer', 'AAB_Lidnummer',["class" => "control-label"])}}
                            <div class="col-md-offset-1 col-md-11">
                                {{Form::text('AAB_Lidnummer',$user->AAB_Lidnummer,["class" => "form-control"])}}
                                @if ($errors->has('AAB_Lidnummer'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('AAB_Lidnummer') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                @endif

                <div class="form-group">
                    <div class="col-md-offset-1 col-md-11">
                        <button type="submit" class="btn btn-default">update</button>
                    </div>
                </div>
                {{Form::hidden('id',$user->id)}}
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection
