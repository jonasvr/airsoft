@extends('layouts.app')

{{--this is add guns!--}}

@section('content')
    <div class="container">
        <div class="row jumbotron">
            <div class="row">
                <div class="col-md-3">
                    <h2>material</h2>
                </div>
            </div>
            <div class="col-md-offset-2 col-md-8">
                {{Form::open(array('url' => route('postAdd'), 'method' => 'POST', "class" => "form-horizontal","files"=>true))}}
                <div class="form-group {{ $errors->has('classe_id') ? ' has-error' : '' }}">
                    {{Form::label('classe_id', 'merk',["class" => "control-label"])}}
                    <div class="col-md-offset-1 col-md-11">
                        {{Form::select('classe_id', $classes,"",["class" => "form-control"])}}
                        @if ($errors->has('classe_id'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('classe_id') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('subclasse_id') ? ' has-error' : '' }}">
                    {{Form::label('classe_id', 'line',["class" => "control-label"])}}
                    <div class="col-md-offset-1 col-md-11">
                        {{Form::select('subclasse_id', $subclasses,"",["class" => "form-control"])}}
                        @if ($errors->has('subclasse_id'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('subclasse_id') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                    {{Form::label('name', 'Naam',["class" => "control-label"])}}
                    <div class="col-md-offset-1 col-md-11">
                        {{Form::text('name', old('name') ,["class" => "form-control"])}}
                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
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
                <div class="form-group {{ $errors->has('omschrijving') ? ' has-error' : '' }}">
                    {{Form::label('omschrijving', 'description',["class" => "control-label"])}}
                    <div class="col-md-offset-1 col-md-11">
                        {{Form::textarea('omschrijving',old('omschrijving'),["class" => "form-control"])}}
                        @if ($errors->has('omschrijving'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('omschrijving') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                -- checkboxes met merken uit database ( op profiel door te linken naar merksite)--
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
