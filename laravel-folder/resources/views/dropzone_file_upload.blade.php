@extends('frontend.layouts.master')

@section('content')
<style>
    .box__dragndrop,
.box__uploading,
.box__success,
.box__error {
  display: none;
}
</style>
    <div class="container" style="margin-bottom: 10px; margin-top: 5px;">
        <section >
            <div id="page-wrapper" class="sign-in-wrapper" style="">
                <div class="" >
                    <div class="col-md-10 col-md-offset-1 reg" style="background: #efefef; border: 1px solid transparent; margin-bottom:20px;">
                        <h4 class="lead text-center text-muted" style="padding: 10px; margin-top: 10px;">Register As Freelancer</h4>
                        <div class="row">
                            <div class="panel-body col-md-12">
                                {!! Form::open([ 'route' => [ 'dropzone.uploadfile' ], 'files' => true, 'class' => 'dropzone','id'=>"my-dropzone"]) !!}
                                    <input type="hidden" name="type" value="freelance">
                                    <div class="col-md-6">
                                        <div class="card row">
                                            <h3 class="lead">Store Images</h3>
                                            
                                            <div id="maindiv" class="col-md-12">
                                                <div class="dz-default dz-message">
                                                    <span>Drop files here to upload</span>
                                                    <p>Maximum number of image(s) 7</p>
                                                </div>
                                                <div class="dz-preview dz-image-preview"></div>
                                            </div>
                                        </div>
                                {!! Form::close() !!}
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('ajax')
    @include('frontend.includes.ajax')
@endsection
@section('js-after')
<script>
alert('kasdjlf');
    var photo_counter = 0;
    Dropzone.options.myDropzone = {
        uploadMultiple: false,
        parallelUploads: 100,
        maxFilesize: 20,
        maxFiles: 7,
        clickable: "#maindiv",
        previewsContainer: '#maindiv .dz-preview',
        addRemoveLinks: false,
        dictRemoveFile: 'Remove',
        dictFileTooBig: 'Image is bigger than 2MB',
        
        headers: {
          'x-csrf-token': $('meta[name="csrf-token"]').attr('content')
        },
        init:function() {
        this.on("removedfile", function(file) {
            $.ajax({
                type: 'POST',
                url: '{{route("dropzone.uploadfile")}}',
                data: {id: file.name, _token: $('#csrf-token').val()},
                dataType: 'html',
                success: function(data){
                    var rep = JSON.parse(data);
                    if(rep.code == 200)
                    {
                        photo_counter--;
                        $("#photoCounter").text( "(" + photo_counter + ")");
                    }

                }
            });

        } );
    },
    error: function(file, response) {
        if($.type(response) === "string")
            var message = response; //dropzone sends it's own error messages in string
        else
            var message = response.message;
        file.previewElement.classList.add("dz-error");
        _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
        _results = [];
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i];
            _results.push(node.textContent = message);
        }
        return _results;
    },
    success: function(file,done) {
        photo_counter++;
        $("#photoCounter").text( "(" + photo_counter + ")");
    }
    };
    
</script>
<style>
    #my-dropzone #maindiv #maindiv, #my-dropzone #maindiv #maindiv * {
            box-sizing: border-box; }

        #my-dropzone #maindiv {
            min-height: 150px;
            border: 1px solid rgba(0, 0, 0, 0.3);
            background: white;
            padding: 25px 25px; }
        #my-dropzone #maindiv.dz-clickable {
            cursor: pointer; }
        #my-dropzone #maindiv.dz-clickable * {
            cursor: default; }
        #my-dropzone #maindiv.dz-clickable .dz-message, #my-dropzone #maindiv.dz-clickable .dz-message * {
            cursor: pointer; }
        #my-dropzone #maindiv.dz-started .dz-message {
            display: none; }
        #my-dropzone #maindiv.dz-drag-hover {
            border-style: solid; }
        #my-dropzone #maindiv.dz-drag-hover .dz-message {
            opacity: 0.5; }
        #my-dropzone #maindiv .dz-message {
            text-align: center;
            margin: 2em 0; }
        #my-dropzone #maindiv .dz-preview {
            position: relative;
            display: inline-block;
            vertical-align: top;
            margin: 16px;
            min-height: 100px; }
        #my-dropzone #maindiv .dz-preview:hover {
            z-index: 1000; }
        #my-dropzone #maindiv .dz-preview:hover .dz-details {
            opacity: 1; }
        #my-dropzone #maindiv .dz-preview.dz-file-preview .dz-image {
            border-radius: 20px;
            background: #999;
            background: linear-gradient(to bottom, #eee, #ddd); }
        #my-dropzone #maindiv .dz-preview.dz-file-preview .dz-details {
            opacity: 1; }
        #my-dropzone #maindiv .dz-preview.dz-image-preview {
            background: white; }
        #my-dropzone #maindiv .dz-preview.dz-image-preview .dz-details {
            -webkit-transition: opacity 0.2s linear;
            -moz-transition: opacity 0.2s linear;
            -ms-transition: opacity 0.2s linear;
            -o-transition: opacity 0.2s linear;
            transition: opacity 0.2s linear; }
        #my-dropzone #maindiv .dz-preview .dz-remove {
            font-size: 14px;
            text-align: center;
            display: block;
            cursor: pointer;
            border: none; }
        #my-dropzone #maindiv .dz-preview .dz-remove:hover {
            text-decoration: underline; }
        #my-dropzone #maindiv .dz-preview:hover .dz-details {
            opacity: 1; }
        #my-dropzone #maindiv .dz-preview .dz-details {
            z-index: 20;
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            font-size: 13px;
            min-width: 100%;
            max-width: 100%;
            padding: 2em 1em;
            text-align: center;
            color: rgba(0, 0, 0, 0.9);
            line-height: 150%; }
        #my-dropzone #maindiv .dz-preview .dz-details .dz-size {
            margin-bottom: 1em;
            font-size: 16px; }
        #my-dropzone #maindiv .dz-preview .dz-details .dz-filename {
            white-space: nowrap; }
        #my-dropzone #maindiv .dz-preview .dz-details .dz-filename:hover span {
            border: 1px solid rgba(200, 200, 200, 0.8);
            background-color: rgba(255, 255, 255, 0.8); }
        #my-dropzone #maindiv .dz-preview .dz-details .dz-filename:not(:hover) {
            overflow: hidden;
            text-overflow: ellipsis; }
        #my-dropzone #maindiv .dz-preview .dz-details .dz-filename:not(:hover) span {
            border: 1px solid transparent; }
        #my-dropzone #maindiv .dz-preview .dz-details .dz-filename span, #my-dropzone #maindiv .dz-preview .dz-details .dz-size span {
            background-color: rgba(255, 255, 255, 0.4);
            padding: 0 0.4em;
            border-radius: 3px; }
        #my-dropzone #maindiv .dz-preview:hover .dz-image img {
            -webkit-transform: scale(1.05, 1.05);
            -moz-transform: scale(1.05, 1.05);
            -ms-transform: scale(1.05, 1.05);
            -o-transform: scale(1.05, 1.05);
            transform: scale(1.05, 1.05);
            -webkit-filter: blur(8px);
            filter: blur(8px); }
        #my-dropzone #maindiv .dz-preview .dz-image {
            border-radius: 20px;
            overflow: hidden;
            width: 120px;
            height: 120px;
            position: relative;
            display: block;
            z-index: 10; }
        #my-dropzone #maindiv .dz-preview .dz-image img {
            display: block; }
        #my-dropzone #maindiv .dz-preview.dz-success .dz-success-mark {
            -webkit-animation: passing-through 3s cubic-bezier(0.77, 0, 0.175, 1);
            -moz-animation: passing-through 3s cubic-bezier(0.77, 0, 0.175, 1);
            -ms-animation: passing-through 3s cubic-bezier(0.77, 0, 0.175, 1);
            -o-animation: passing-through 3s cubic-bezier(0.77, 0, 0.175, 1);
            animation: passing-through 3s cubic-bezier(0.77, 0, 0.175, 1); }
        #my-dropzone #maindiv .dz-preview.dz-error .dz-error-mark {
            opacity: 1;
            -webkit-animation: slide-in 3s cubic-bezier(0.77, 0, 0.175, 1);
            -moz-animation: slide-in 3s cubic-bezier(0.77, 0, 0.175, 1);
            -ms-animation: slide-in 3s cubic-bezier(0.77, 0, 0.175, 1);
            -o-animation: slide-in 3s cubic-bezier(0.77, 0, 0.175, 1);
            animation: slide-in 3s cubic-bezier(0.77, 0, 0.175, 1); }
        #my-dropzone #maindiv .dz-preview .dz-success-mark, #my-dropzone #maindiv .dz-preview .dz-error-mark {
            pointer-events: none;
            opacity: 0;
            z-index: 500;
            position: absolute;
            display: block;
            top: 50%;
            left: 50%;
            margin-left: -27px;
            margin-top: -27px; }
        #my-dropzone #maindiv .dz-preview .dz-success-mark svg, #my-dropzone #maindiv .dz-preview .dz-error-mark svg {
            display: block;
            width: 54px;
            height: 54px; }
        #my-dropzone #maindiv .dz-preview.dz-processing .dz-progress {
            opacity: 1;
            -webkit-transition: all 0.2s linear;
            -moz-transition: all 0.2s linear;
            -ms-transition: all 0.2s linear;
            -o-transition: all 0.2s linear;
            transition: all 0.2s linear; }
        #my-dropzone #maindiv .dz-preview.dz-complete .dz-progress {
            opacity: 0;
            -webkit-transition: opacity 0.4s ease-in;
            -moz-transition: opacity 0.4s ease-in;
            -ms-transition: opacity 0.4s ease-in;
            -o-transition: opacity 0.4s ease-in;
            transition: opacity 0.4s ease-in; }
        #my-dropzone #maindiv .dz-preview:not(.dz-processing) .dz-progress {
            -webkit-animation: pulse 6s ease infinite;
            -moz-animation: pulse 6s ease infinite;
            -ms-animation: pulse 6s ease infinite;
            -o-animation: pulse 6s ease infinite;
            animation: pulse 6s ease infinite; }
        #my-dropzone #maindiv .dz-preview .dz-progress {
            opacity: 1;
            z-index: 1000;
            pointer-events: none;
            position: absolute;
            height: 16px;
            left: 50%;
            top: 50%;
            margin-top: -8px;
            width: 80px;
            margin-left: -40px;
            background: rgba(255, 255, 255, 0.9);
            -webkit-transform: scale(1);
            border-radius: 8px;
            overflow: hidden; }
        #my-dropzone #maindiv .dz-preview .dz-progress .dz-upload {
            background: #333;
            background: linear-gradient(to bottom, #666, #444);
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            width: 0;
            -webkit-transition: width 300ms ease-in-out;
            -moz-transition: width 300ms ease-in-out;
            -ms-transition: width 300ms ease-in-out;
            -o-transition: width 300ms ease-in-out;
            transition: width 300ms ease-in-out; }
        #my-dropzone #maindiv .dz-preview.dz-error .dz-error-message {
            display: block; }
        #my-dropzone #maindiv .dz-preview.dz-error:hover .dz-error-message {
            opacity: 1;
            pointer-events: auto; }
        #my-dropzone #maindiv .dz-preview .dz-error-message {
            pointer-events: none;
            z-index: 1000;
            position: absolute;
            display: block;
            display: none;
            opacity: 0;
            -webkit-transition: opacity 0.3s ease;
            -moz-transition: opacity 0.3s ease;
            -ms-transition: opacity 0.3s ease;
            -o-transition: opacity 0.3s ease;
            transition: opacity 0.3s ease;
            border-radius: 8px;
            font-size: 13px;
            top: 130px;
            left: -10px;
            width: 140px;
            background: #be2626;
            background: linear-gradient(to bottom, #be2626, #a92222);
            padding: 0.5em 1.2em;
            color: white; }
        #my-dropzone #maindiv .dz-preview .dz-error-message:after {
            content: '';
            position: absolute;
            top: -6px;
            left: 64px;
            width: 0;
            height: 0;
            border-left: 6px solid transparent;
            border-right: 6px solid transparent;
            border-bottom: 6px solid #be2626; }
        #my-dropzone #maindiv {
            border: 2px dashed #0087F7;
            border-radius: 5px;
            background: white; }
        #my-dropzone #maindiv .dz-message {
            font-weight: 400; }
        #my-dropzone #maindiv .dz-message .note {
            font-size: 0.8em;
            font-weight: 200;
            display: block;
            margin-top: 1.4rem; }
</style>
@endsection
