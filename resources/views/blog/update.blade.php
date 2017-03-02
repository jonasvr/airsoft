@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        blog

                    </div>
                    <div class="panel-body">

                        {{ Form::open(array('url' => route('update-blog'), 'method' => 'post')) }}

                        <div class="form-group">
                            {{ Form::label('title', 'Titel',['class' => 'text-capitalize']) }}<br>
                            {{ Form::text('title',$blog->title,['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('text', 'text',['class' => 'text-capitalize']) }}
                            {{ Form::textarea('text',$blog->text,['class' => 'form-control']) }}
                        </div>
                        {{Form::hidden('id',$blog->id)}}

                        {{ Form::submit() }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
@endsection