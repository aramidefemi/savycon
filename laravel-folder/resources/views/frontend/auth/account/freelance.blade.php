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
                            <form action="{{ url("auth/register/freelance") }}" id="info-form" class="form-horizontal" method="POST">
                                {{ csrf_field() }}
                                <div class="col-md-6">
                                    <div class="col-md-12 card">
                                        <h4 class="text-muted" style="padding: 10px">Personal Details</h4>
                                        <hr>
                                        <div class="form-group">
                                            {!! Form::label('name', trans('validation.attributes.name'), ['class' => 'col-md-1 control-label']) !!}
                                            <div class="col-md-12">
                                                {!! Form::input('name', 'name', old('name'), ['class' => 'form-control', 'placeholder'=>'Enter your full name']) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('phone', 'Phone', ['class' => 'col-md-1 control-label']) !!}
                                            <div class="col-md-12">
                                                {!! Form::input('text', 'phone', old('phone'), ['class' => 'form-control', 'placeholder'=>'Enter your Phone Number(separate multiple with [,])']) !!}
                                            </div>
                                        </div>
                                        {{-- {!! Form::input('hidden', 'user_type',  ['class' => 'form-control', 'value'=>'freelance']) !!}--}}
                                        <input type="hidden" name="user_type" value="freelance">
                                        <div class="form-group">
                                            {!! Form::label('email', trans('validation.attributes.email'), ['class' => 'col-md-2 contrsol-label']) !!}
                                            <div class="col-md-12">
                                                {!! Form::input('email', 'email', old('email'), ['class' => 'form-control', 'placeholder'=>'Enter your email']) !!}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('password', trans('validation.attributes.password'), ['class' => 'col-md-1 control-label']) !!}
                                            <div class="col-md-12">
                                                {!! Form::input('password', 'password', null, ['class' => 'form-control','placeholder'=>'Enter Password']) !!}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('password_confirmation', trans('validation.attributes.password_confirmation'), ['class' => 'col-md-12 controsl-label']) !!}
                                            <div class="col-md-12">
                                                {!! Form::input('password', 'password_confirmation', null, ['class' => 'form-control', 'placeholder'=>'Confirm Password']) !!}
                                            </div>
                                        </div>

                                    </div>
                                    <!--<div class="col-md-12 card" style="margin-top: 10px;;">-->
                                    <!--    <h4 class="text-muted" style="padding: 10px">Store Images</h4>-->
                                    <!--    <hr>-->
                                    <!--    <div id="maindiv" class="form-group">-->
                                    <!--        {!! Form::label('name', 'Upload Store Images', ['class' => 'col-md-6 codntrol-label']) !!}-->
                                    <!--        <div class="col-md-12">-->
                                    <!--            <input type="file" id="exampleInputFile" name="photos[]" multiple />-->
                                    <!--            <p>Maximum number of image(s) 7</p>-->
                                    <!--            <div class="dz-preview dz-image-preview"></div>-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12 card">
                                        <h4 class="text-muted" style="padding: 10px">Store Details</h4>
                                        <hr>
                                        <div class="form-group">
                                            {!! Form::label('Title', 'Title', ['class' => 'col-md-1 control-label']) !!}
                                            <div class="col-md-12">
                                                {!! Form::input('text', 'title', old('title'), ['class' => 'form-control', 'placeholder'=>'Enter Freelance Title E.g Fashion Designer']) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('Url', 'Url', ['class' => 'col-md-1 control-label']) !!}
                                            <div class="col-md-12">
                                                {!! Form::input('text', 'url', old('url'), ['class' => 'form-control', 'placeholder'=>'Enter your Site address, Youtube Address (Optional)']) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('category', 'Job Category', ['class' => 'col-md-12 control-ldabel']) !!}
                                            <div class="col-md-12">
                                                <select name="category" id="category" class="form-control">
                                                    <option value="">Select your Job Category</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->name }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="address" class="col-md-1 control-label">Address</label>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" id="address" name="address">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('state', 'State', ['class' => 'col-md-1 control-label']) !!}
                                            <div class="col-md-12">
                                                <select name="state" id="state" class="form-control">
                                                    <option value="">Select your State</option>
                                                    @foreach($states as $state)
                                                        <option value="{{ $state->name }}">{{ $state->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('lga', 'Area', ['class' => 'col-md-1 control-label']) !!}
                                            <div class="col-md-12">
                                                <select name="lga" id="lga" class="form-control">
                                                    <option value="">Select Local Gvt.</option>

                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('price', 'Price', ['class' => 'col-md-1 control-label']) !!}
                                            <div class="col-md-12">
                                                {!! Form::input('text', 'price', old('tag'), ['class' => 'form-control', 'id' => 'priceField']) !!}
                                                <span class="hidden btn btn-sm col-lg-12 col-md-12 col-sm-12 col-xs-12" id="contactFor" style="cursor: pointer;border: 1px solid #e7e7e7; text-align: left !important;">Contact For</span>
                                            
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('price_type', 'Price Type', ['class' => 'col-md-3 contrsol-label']) !!}
                                            <div class="col-md-12">
                                                <select name="price_type" id="price_type" class="form-control">
                                                    <option value="">Select Price Type</option>
                                                    <option value="Negotiable">Negotiable</option>
                                                    <option value="Contact For Price">Contact For</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('tag', 'Tag', ['class' => 'col-md-1 control-label']) !!}
                                            <div class="col-md-12">
                                                {!! Form::input('text', 'tag', old('tag'), ['class' => 'form-control', 'placeholder'=>'Enter your Freelance Tag']) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('desc', 'Description', ['class' => 'col-md-1 control-label']) !!}
                                            <div class="col-md-12">
                                                <textarea name="description" id="description"  class="form-control" placeholder='Enter your Freelance Description'></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-8 col-md-offset-2">
                                                {!! Form::submit(trans('labels.register_button'), ['class' => 'account btn btn-info btn-block']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            </div>
                            <div class="panel-body col-md-6" style="margin-top: -38%;width: 46%;margin-left: 3%;">
                                <div class="card row">
                                    <h3 class="lead">Store Images</h3>
                                    {!! Form::open([ 'route' => [ 'dropzone.uploadfile' ], 'files' => true, 'class' => 'dropzone','id'=>"my-dropzone"]) !!}
                                    <input type="hidden" name="type" value="freelance">
                                    <div id="maindiv" class="col-md-12">
                                        <div class="dz-default dz-message">
                                            <span>Drop files here to upload</span>
                                            <p>Maximum number of image(s) 7</p>
                                        </div>
                                        <div class="dz-preview dz-image-preview"></div>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div><!-- panel body -->
                        </div>

                    </div>
                </div>
            </div>
        </section>

    </div>
    <meta name="csrf-token" content="CL2tR2J4UHZXcR9BjRtSYOKzSmL8U1zTc7T8d6Jz">
@endsection

@section('ajax')
    @include('frontend.includes.ajax')
@endsection
@section('js-after')
<script>
    $('#priceField').focus(function () {
        $('#contactFor').removeClass('hidden');
    });
    $('#contactFor').click(function () {
        $('#priceField').val($('#contactFor').text());
        $('#contactFor').addClass('hidden');
    });
    
</script>
<script>
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
                    console.log(data);
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
