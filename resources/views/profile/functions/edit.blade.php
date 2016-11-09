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
                    <img src="{{asset('img/no-pic.png')}}" alt="">
                </a>
            </div>
            <div class="col-md-8">
                {{Form::open(array('url' => route('postedit'), 'method' => 'POST', "class" => "form-horizontal"))}}
                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                    {{Form::label('name', 'Naam',["class" => "control-label"])}}
                    <div class="col-md-offset-1 col-md-11">
                        {{Form::text('name',Auth::user()->name,["class" => "form-control"])}}
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
                     {{Form::text('nickname',Auth::user()->nickname,["class" => "form-control"])}}
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
                    {{Form::text('callsign',Auth::user()->callsign,["class" => "form-control"])}}
                        @if ($errors->has('callsign'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('callsign') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('gsm') ? ' has-error' : '' }}">
                    {{Form::label('birthday', 'Birthday',["class" => "control-label"])}}
                    <div name="birthday" class="col-md-offset-1 col-md-11">
                        {!! Form::date('Birthday','', ['class' => 'form-control']) !!}
                        @if ($errors->has('Birthday'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('Birthday') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('gsm') ? ' has-error' : '' }}">
                    {{Form::label('gsm', 'gsm',["class" => "control-label"])}}
                    <div class="col-md-offset-1 col-md-11">
                        {{Form::text('gsm',Auth::user()->gsm,["class" => "form-control"])}}
                        @if ($errors->has('gsm'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('gsm') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-1 col-md-11">
                        <button type="submit" class="btn btn-default">update</button>
                    </div>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>

@endsection
