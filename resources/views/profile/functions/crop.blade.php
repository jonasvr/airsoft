@extends('layouts.app')

@section('head')

@endsection

@section('content')

    <div>
        <img src="{{asset($image)}}" id='image' alt="">
    </div>
    {{Form::open(array('url' => '/jcrop', 'method' => 'POST', "class" => "form-horizontal"))}}
    <?= Form::hidden('image', $image) ?>
    <?= Form::hidden('x', '', array('id' => 'x')) ?>
    <?= Form::hidden('y', '', array('id' => 'y')) ?>
    <?= Form::hidden('w', '', array('id' => 'w')) ?>
    <?= Form::hidden('h', '', array('id' => 'h')) ?>
    <?= Form::hidden('redirect', $redirect) ?>
    <?= Form::submit('Crop it!') ?>
    <?= Form::close() ?>
@endsection

@section('scripts')
    <link rel="stylesheet" type="text/css" href="/css/cropper.css" />
    <script type="text/javascript" src="/js/cropper.js"></script>
    <script>
        $(function () {
            var $image = $('#image');
            var minAspectRatio = 0.5;
            var maxAspectRatio = 1.5;

            $image.cropper({
                aspectRatio: 1 / 1,
                ready: function () {
                    var containerData = $image.cropper('getContainerData');
                    var cropBoxData = $image.cropper('getCropBoxData');
                    var aspectRatio = cropBoxData.width / cropBoxData.height;
                    var newCropBoxWidth;

                    if (aspectRatio < minAspectRatio || aspectRatio > maxAspectRatio) {
                        newCropBoxWidth = cropBoxData.height * ((minAspectRatio + maxAspectRatio) / 2);

                        $image.cropper('setCropBoxData', {
                            left: (containerData.width - newCropBoxWidth) / 2,
                            width: newCropBoxWidth
                        });
                    }
                },
                cropmove: function () {
                    var cropBoxData = $image.cropper('getCropBoxData');
                    var aspectRatio = cropBoxData.width / cropBoxData.height;

                    if (aspectRatio < minAspectRatio) {
                        $image.cropper('setCropBoxData', {
                            width: cropBoxData.height * minAspectRatio
                        });
                    } else if (aspectRatio > maxAspectRatio) {
                        $image.cropper('setCropBoxData', {
                            width: cropBoxData.height * maxAspectRatio
                        });
                    }
                },
                crop: function(e) {
                    // Output the result data for cropping image.
                    $('#x').val(e.x);
                    $('#y').val(e.y);
                    $('#w').val(e.width);
                    $('#h').val(e.height);

                    console.log(e.rotate);
                    console.log(e.scaleX);
                    console.log(e.scaleY);
                }
            });
        });
    </script>
@endsection