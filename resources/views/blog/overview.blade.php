@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($blogs as $blog)
                <div class="jumbotron col-md-10 col-md-offset-1">
                    <div class="row">
                        <div class="col-md-4 text-capitalize "><h2>{{$blog->title}}</h2></div>
                        <div class="col-md-offset-4 col-md-4">{{$blog->created_at}}</div>
                    </div>
                    <hr>
                    @if(Auth::user()->role == 'admin')
                     <a href="{{route('get-update-blog',['id' => $blog->id])}}"><span class="fa fa-pencil"></span></a>
                    @endif
                    <p>
                        {!! $blog->text  !!}
                    </p>
                </div>
            @endforeach
            @include('blog.partial.pagnation', ['paginator' => $blogs])
        </div>
    </div>
@endsection

@section('scripts')
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
@endsection