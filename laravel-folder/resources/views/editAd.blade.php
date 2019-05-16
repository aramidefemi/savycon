@extends('frontend.layouts.master')

@section('content')


@section('body','page home-style1')
@section('head')
    <style>
        @import url(http://fonts.googleapis.com/css?family=Droid+Sans);
        form{
            background-color:white;
        }
        #maindiv{
            /*width:960px;*/
            margin:10px auto;
            padding:10px;
            font-family: 'Droid Sans', sans-serif;
        }
        #formdiv{
            /*width:500px;*/
            float:left;
            /*text-align: center;*/
        }
        form{
            padding: 40px 20px;
            box-shadow: 0px 0px 10px;
            border-radius: 2px;
        }
        h2{
            margin-left: 30px;
        }
        .upload{
            background-color:#ff0000;
            border:1px solid #ff0000;
            color:#fff;
            border-radius:5px;
            padding:10px;
            text-shadow:1px 1px 0px green;
            box-shadow: 2px 2px 15px rgba(0,0,0, .75);
        }
        .upload:hover{
            cursor:pointer;
            background:#c20b0b;
            border:1px solid #c20b0b;
            box-shadow: 0px 0px 5px rgba(0,0,0, .75);
        }
        #file{
            color:green;
            padding:5px; border:1px dashed #123456;
            background-color: #f9ffe5;
        }
        #upload{
            margin-left: 45px;
        }

        #noerror{
            color:green;
            text-align: left;
        }
        #error{
            color:red;
            text-align: left;
        }
        #img{
            width: 17px;
            border: none;
            height:17px;
            margin-left: -20px;
            margin-bottom: 91px;
        }

        .abcd{
            text-align: center;
        }

        .abcd img{
            height:100px;
            width:100px;
            padding: 5px;
            border: 1px solid rgb(232, 222, 189);
            float: left;
            clear: right;
        }
        b{
            color:red;
        }
        #formget{
            float:right;

        }
    </style>

@endsection
@section('footer')
    <script>
        var abc = 0; //Declaring and defining global increement variable

        $(document).ready(function() {

//To add new input file field dynamically, on click of "Add More Files" button below function will be executed
            $('#add_more').click(function() {
                $(this).before($("<div/>", {id: 'filediv'}).fadeIn('slow').append(
                        $("<input/>", {name: 'file[]', type: 'file', id: 'file'})
                        
                ));
            });

//following function will executes on change event of file input to select different file
            $('body').on('change', '#file', function(){
                if (this.files && this.files[0]) {
                    abc += 1; //increementing global variable by 1

                    var z = abc - 1;
                    var x = $(this).parent().find('#previewimg' + z).remove();
                    $(this).before("<div id='abcd"+ abc +"' class='abcd'><img id='previewimg" + abc + "' src=''/></div>");

                    var reader = new FileReader();
                    reader.onload = imageIsLoaded;
                    reader.readAsDataURL(this.files[0]);

                    $(this).hide();
                    $("#abcd"+ abc).append($("<img/>", {id: 'img', src: 'x.png', alt: 'delete'}).click(function() {
                        $(this).parent().parent().remove();
                    }));
                }
            });

//To preview image
            function imageIsLoaded(e) {
                $('#previewimg' + abc).attr('src', e.target.result);
            };

            $('#upload').click(function(e) {
                var name = $(":file").val();
                if (!name)
                {
                    alert("First Image Must Be Selected");
                    e.preventDefault();
                }
            });
        });
    </script>
@stop
<style>
    .card{
        box-shadow: 0px 0px 4px rgba(110,110,110, 0.4);
        border: 1px solid transparent;
        padding: 15px;
        margin-bottom: 10px;;
    }
        .box__dragndrop,
.box__uploading,
.box__success,
.box__error {
  display: none;
}
</style>

<div class="container">
    
@if(auth()->user()->user_type == 'buyer')
                  <form id="my-dropzone" class="dropzone" action="/edit/ad" method="POST" enctype="multipart/form-data">
                    
                    {{ csrf_field()  }}
                    
                    <div class="card row">
                        <h3 class="lead">Photos</h3>
                        <p class="help-block" style="padding:0px !important;">
                            Ads with photo get 5x more clients. Accepted formats are .jpg, .gif and .png. Max allowed size for uploaded files is 5 MB.
                            Add at least one photo if you post car or phone.
                        </p>
                        <div id="maindiv" class="col-md-12">
                            <div class="dz-default dz-message"><span>Drop files here to upload</span></div>
                            <div class="dz-preview dz-image-preview"></div>
                            <div id="formdiv" class="col-md-12">
                                <div class="form-group">
                                    
                                    <div id="filediv">
                                    <input name="file[]" type="file" class="form-control" id="file" multiple />
                                    </div>                                </div>
                                <div class="form-group">
                                    <input type="button" id="add_more" class="upload" value="Add More Files" style="background-color: #0bbe83; border-color: #0bbe83;"/>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="card row">
                        <h3 class="lead">Advert Information</h3>
                        <div class="form-group">
                            <label for="name">Title</label>
                            <input type="text" name="title" id="title" required class="form-control" value="{{ $adverts['title'] }}" placeholder="Please write a clear title for your item">
                        </div>
                        <div class="form-group">
                            <label for="category">Job Category</label>
                            <div class="co">
                           <select name="category_name" id="cat" class="form-control">
                            <option value="{{ $adverts['category_name'] }}">{{ $adverts['category_name'] }}</option>
                              @foreach($categories as $category)
                                @if($category->name !== $adverts['category_name'])
                                    <option values="{{ $category->name }}">{{ $category->name }}</option>
                             
                                @endif
                              @endforeach
                                    
                            </select>
                         
                            </div>
                        </div>
                        <div class="form-group col-md-6" style="padding-left: 0px">
                            <label for="name">Price</label>
                            <div class="input-group">
                                <span class="input-group-addon">&#8358;</span>
                                <input type="number" name="price" value="{{ $adverts['price'] }}" class="form-control" aria-label="Amount (to the nearest Naira)" placeholder="Enter Price">
                                <span class="input-group-addon">.00</span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Number of Gadget</label>
                            <input type="number" name="no_of_gadget" value="{{ $adverts['no_of_gadget'] }}" class="form-control" placeholder="Enter number of Gadget(s)">
                        </div>
                        <div class="form-group col-md-">
                            <label for="name">Address</label>
                           <input type="text" name="address" class="form-control" value="{{ $adverts['address'] }}" placeholder="Enter your Address">
                        </div>
                        <div class="form-group col-md-6" style="padding-left:0px">
                            <label for="name">Number of Worker Needed</label>
                            <input type="number" name="no_of_worker" class="form-control" value="{{ $adverts['no_of_workers'] }}" placeholder="Enter number of worker(s)">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Tag</label>
                            <input type="text" name="tag" value="{{ $adverts['tag'] }}" class="form-control" placeholder="Enter your tag">
                        </div>
                        <div class="form-group">
                            <label for="name">Description</label>
                            <textarea name="description" required id="desc"  rows="6" class="form-control" placeholder="Please provide a detailed description. You can mention as many details as possible. It will make your ad more attractive for buyers.">
                                {{ $adverts['description'] }}
                            </textarea>
                        </div>
                    </div>
                        
                        <input type="hidden" value="{{ $adverts['id'] }}" name="adId">
                        <input type="hidden" value="{{ $adverts['user_id'] }}" name="user_id">
                    <div class="card row">
                        <div class="form-group">
                            <input type="submit" name="submit" value="Edit AD" class="btn btn-info ">
                        </div>
                    </div>

                </form>
               @else
                     
                     
                     <form action="/edit/ad" id="my-dropzone" class="form-horizontal dropzone" method="POST">
                   
                                {{ csrf_field() }}
                                <div class="col-md-6">
                                    <div class="col-md-12 card">
                                        <h4 class="text-muted" style="padding: 10px">Personal Details</h4>
                                        <hr>
                                        <input type="hidden" value="{{ $adverts->id }}" name="aId">
                                        <input type="hidden" value="{{ $user_info->id }}" name="uId">
                                        <div class="form-group">
                                            {!! Form::label('name', trans('validation.attributes.name'), ['class' => 'col-md-1 control-label']) !!}
                                        <div class="col-md-12">
                                            <input type="text" name="name" value="{{ $user_info->name }}" class="form-control">
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('phone', 'Phone', ['class' => 'col-md-1 control-label']) !!}
                                            <div class="col-md-12">
                                                <input type="text" name="phone" value="{{ $user_info->phone }}" class="form-control">
                                             </div>
                                        </div>
                                        {{-- {!! Form::input('hidden', 'user_type',  ['class' => 'form-control', 'value'=>'freelance']) !!}--}}
                                        <input type="hidden" name="user_type" value="freelance">
                                        <div class="form-group">
                                            {!! Form::label('email', trans('validation.attributes.email'), ['class' => 'col-md-2 contrsol-label']) !!}
                                            <div class="col-md-12">
                                                <input type="email" name="email" value="{{ $user_info->email }}" class="form-control">
                                                
                                            </div>
                                        </div>

                                      

                                    </div>
                               
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12 card">
                                        <h4 class="text-muted" style="padding: 10px">Store Details</h4>
                                        <hr>
                                        <div class="form-group">
                                            {!! Form::label('Title', 'Title', ['class' => 'col-md-1 control-label']) !!}
                                            <div class="col-md-12">
                                                <input type="text" name="title" value="{{ $adverts->title }}" class="form-control">
                                             </div>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('Url', 'Url', ['class' => 'col-md-1 control-label']) !!}
                                            <div class="col-md-12">
                                                <input type="text" name="url" value="{{ $adverts->url }}" class="form-control">
                                             
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('category', 'Job Category', ['class' => 'col-md-12 control-ldabel']) !!}
                                            <div class="col-md-12">
                                                <select name="category" id="category" class="form-control">
                                                    <option value="{{ $adverts->category }}">{{ $adverts->category }}</option>
                                                    @foreach($categories as $category)
                                        @if($category->name !== $adverts->category)
                                                        <option value="{{ $category->name }}">{{ $category->name }}</option>
                                        @endif
                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                      
                                        <!--<div class="form-group">-->
                                        <!--    {!! Form::label('lga', 'Area', ['class' => 'col-md-1 control-label']) !!}-->
                                        <!--    <div class="col-md-12">-->
                                        <!--        <select name="lga" id="lga" class="form-control">-->
                                        <!--            <option value="">Select Local Gvt.</option>-->

                                        <!--        </select>-->
                                        <!--    </div>-->

                                        <!--</div>-->
                                        <div class="form-group">
                                            {!! Form::label('price', 'Price', ['class' => 'col-md-1 control-label']) !!}
                                            <div class="col-md-12">
                                                <input type="text" name="price" value="{{ $adverts->price }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('price_type', 'Price Type', ['class' => 'col-md-3 contrsol-label']) !!}
                                            <div class="col-md-12">
                                                <select name="price_type" id="price_type" class="form-control">
                                                    <option value="{{ $adverts->price_type }}">{{ $adverts->price_type }}</option>
                                        @if($adverts->price_type !== 'Negotiable')
                                                    <option value="Negotiable">Negotiable</option>
                                        @else
                                                    <option value="Contact For Price">Contact For Price</option>
                                        @endif
                                                </select>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                                {!! Form::label('state', 'State', ['class' => 'col-md-4 control-label']) !!}
                                        <div class="col-md-8">
                                                    <select name="state" id="state" class="form-control">
                                            
                                                        <option value="{{ $adverts->state }}">{{ $adverts->state }}</option>
                                                        @foreach($states as $state)
                                                           @if($state->name !== $adverts->state)
                                        <option  value="{!! $state->name !!}">{{ $state->name }}</option>
                                        @endif
                                                  @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                        <div class="form-group">
                                            {!! Form::label('lga', 'Area', ['class' => 'col-md-4 control-label']) !!}
                                            <div class="col-md-8">
                                                <select name="lga" id="lga" class="form-control">
                                                    <option value="{{ $adverts->lga }}">{{ $adverts->lga }}</option>
            
                                                </select>
                                            </div>
            
                                        </div>
                                        
                                        
                                        
                                        <div class="form-group">
                                            {!! Form::label('tag', 'Tag', ['class' => 'col-md-1 control-label']) !!}
                                            <div class="col-md-12">
                                                <input type="text" name="tag" value="{{ $adverts->tag }}" class="form-control">
                                             
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('desc', 'Description', ['class' => 'col-md-1 control-label']) !!}
                                            <div class="col-md-12">
                                                <textarea name="description" id="description"  class="form-control" placeholder='Enter your Freelance Description'>
                                                    {{ $adverts->description }}
                                                </textarea>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                           <div class="card row">
                        <h3 class="lead">Photos</h3>
                        <p class="help-block" style="padding:0px !important;">
                            Ads with photo get 5x more clients. Accepted formats are .jpg, .gif and .png. Max allowed size for uploaded files is 5 MB.
                            Add at least one photo if you post car or phone.
                        </p>
                        <div id="maindiv" class="col-md-12">
                            <div class="dz-default dz-message"><span>Drop files here to upload</span></div>
                            <div class="dz-preview dz-image-preview"></div>
                            {{--<div id="formdiv" class="col-md-12">--}}
                                {{--<div class="form-group">--}}
                                    {{----}}
                                    {{--<div id="filediv">--}}
                                        {{--<input name="file[]" type="file" class="form-control" id="file" multiple />--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="form-group">--}}
                                    {{--<input type="button" id="add_more" class="upload" value="Add More Files"/>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                                        
                                        
                                        
                                        <div class="form-group">
                                            <div class="col-md-8 col-md-offset-2">
                                                {!! Form::submit('Edit', ['class' => 'account btn btn-info btn-block']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 
                            </form>
                     
            @endif

</div>
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
@section('ajax')
    @include('frontend.includes.ajax')
@endsection