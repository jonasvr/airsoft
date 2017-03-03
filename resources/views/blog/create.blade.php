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

                        {{ Form::open(array('url' => route('create-blog'), 'method' => 'post')) }}

                        <div class="form-group">
                            {{ Form::label('title', 'Titel',['class' => 'text-capitalize']) }}<br>
                            {{ Form::text('title',old('title'),['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('text', 'text',['class' => 'text-capitalize']) }}
                            {{ Form::textarea('text',old('title'),['class' => 'form-control','id'=>'blog']) }}
                        </div>


                        {{ Form::submit() }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#blog').summernote({
                height:300,
            });
        });
    </script>

    {{--<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>--}}
    {{--<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>--}}
@endsection