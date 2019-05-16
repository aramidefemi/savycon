@extends('frontend.layouts.master')

@section('content')
@section('body','page home-style1')
<style>
    .card{
        box-shadow: 0px 0px 4px rgba(110,110,110, 0.4);
        border: 1px solid transparent;
        padding: 15px;
        margin-bottom: 10px;;
    }
</style>
<div class="container">

    <div class="col-md-10 col-md-offset-1" style="margin-top: 20px;">

        <div class="panel panel-default card">
            <div class="panel-body">
                @if(auth()->user()->user_type == 'freelance' )
                <div class="child-top clearfix card row" data-color="#ff9901" style="background: rgb(243, 197, 0); margin-bottom: 10px;">
                    <div class="box-title pull-left">
                        <h3>Place New Advert</h3>
                    </div>
                </div>
                @elseif(auth()->user()->user_type == 'buyer')
                  <div class="child-top clearfix card row" data-color="#ff9901" style="background: rgb(1, 161, 133); margin-bottom: 10px;">
                    <div class="box-title pull-left">
                        <h3>Place New Advert</h3>
                    </div>
                </div>
                @else
                  <div class="child-top clearfix card row" data-color="#ff9901" style="background: rgb(1, 161, 133); margin-bottom: 10px;">
                    <div class="box-title pull-left">
                        <h3>Place New Advert</h3>
                    </div>
                </div>
                @endif
                <form action="{{ url("new-advert") }}" method="POST" enctype="multipart/form-data">
                    <!--{!! csrf_field() !!}-->
                    {{ csrf_field()  }}
                    <div class="card row">
                        <h3 class="lead">Photos</h3>
                        <p class="help-block">
                            Ads with photo get 5x more clients. Accepted formats are .jpg, .gif and .png. Max allowed size for uploaded files is 5 MB.
                            Add at least one photo if you post car or phone.
                        </p>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="exampleInputFile">Upload Advert Image(s)</label>
                                <input type="file" id="exampleInputFile" name="photos[]" multiple />
                                <p class="help-block">Maximum number of images 5</p>
                            </div>
                        </div>
                    </div>

                    <div class="card row">
                        <h3 class="lead">Advert Information</h3>
                        <div class="form-group">
                            <label for="name">Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Please write a clear title for your item">
                        </div>
                        <div class="form-group">
                            <label for="category">Job Category</label>
                            <div class="co">
                                @if($category == '')
                                    <select name="category_name" id="cat" class="form-control">

                                        @foreach($categories as $category)
                                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <input type="text" readonly class="form-control" name="category_name" value="{{ $category }}">
                                @endif
                            </div>
                        </div>
                        <div class="form-group col-md-6" style="padding-left: 0px">
                            <label for="name">Price</label>
                            <div class="input-group">
                                <span class="input-group-addon">&#8358;</span>
                                <input type="number" name="price" class="form-control" aria-label="Amount (to the nearest Naira)" placeholder="Enter Price">
                                <span class="input-group-addon">.00</span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Number of Gadget</label>
                            <input type="number" name="no_of_gadget" class="form-control" placeholder="Enter number of Gadget(s)">
                        </div>
                        <div class="form-group col-md-">
                            <label for="name">Address</label>
                           <input type="text" name="address" class="form-control" placeholder="Enter your Address">
                        </div>
                        <div class="form-group col-md-6" style="padding-left:0px">
                            <label for="name">Number of Worker Needed</label>
                            <input type="number" name="no_of_worker" class="form-control" placeholder="Enter number of worker(s)">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Tag</label>
                            <input type="text" name="tag" class="form-control" placeholder="Enter your tag">
                        </div>
                        <div class="form-group">
                            <label for="name">Description</label>
                            <textarea name="description" id="desc"  rows="6" class="form-control" placeholder="Please provide a detailed description. You can mention as many details as possible. It will make your ad more attractive for buyers."></textarea>
                        </div>
                    </div>

                    <div class="card row">
                        <div class="form-group">
                            <input type="submit" name="submit" value="Create Free AD" class="btn btn-info ">
                        </div>
                    </div>

                </form>
            </div>
        </div><!-- panel -->

    </div><!-- col-md-10 -->

</div><!-- row -->
@endsection
@section('ajax')
    @include('frontend.includes.ajax')
@endsection

