@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row jumbotron">
            <h2>Contact</h2>
            {{Form::open(array('url' => route('send'), 'method' => 'POST', "class" => "form-horizontal"))}}
            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                {{Form::label('email', 'Email',["class" => "control-label"])}}
                <div class="col-md-offset-1 col-md-11">
                    {{Form::email('email', old('email') ,["class" => "form-control"])}}
                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group {{ $errors->has('vraag') ? ' has-error' : '' }}">
                {{Form::label('vraag', 'vraag',["class" => "control-label"])}}
                <div class="col-md-offset-1 col-md-11">
                    {{Form::textarea('vraag',old('vraag'),["class" => "form-control"])}}
                    @if ($errors->has('vraag'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('vraag') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-1 col-md-11">
                    <button type="submit" class="btn btn-default">Send</button>
                </div>
            </div>
            {{Form::close()}}
        </div>
    </div>

@endsection
