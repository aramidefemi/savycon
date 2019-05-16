@extends('backend.layouts.master')

@section('page-header')
    <h1>
        New Category
    </h1>
@endsection


@section('content')
    <style>
        .card{
            box-shadow: 0px 0px 4px rgba(110,110,110, 0.4);
            border: 1px solid transparent;
            padding: 15px;
            margin-bottom: 10px;;
        }
    </style>
    <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Create New Category</h3>
          <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <div class="box-body">

            <div class="row">

                <div class="col-md-10 col-md-offset-1" style="margin-top: 20px;">

                    <div class="panel panel-default card">
                        <div class="panel-body">
                            <div class="child-top clearfix card row" data-color="#ff9901" style="background: rgba(255, 118, 1, 0.93); margin-bottom: 10px;">
                                <div class="box-title pull-left">
                                    <h3>Place New Advert</h3>
                                </div>
                            </div>
                            <form action="{{ url("admin/new-advert") }}" method="POST" enctype="multipart/form-data">
                                {!! csrf_field() !!}
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
                                    <h3 class="lead">Choose your Region</h3>
                                    <div class="form-group col-md-6" style="padding-left: 0px;">
                                        <label for="state">State</label>
                                        <select name="state" id="state" class="form-control">
                                            <option value="">Select  State</option>
                                            @foreach($states as $state)
                                                <option value="{{ $state->state_id }}">{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">LGA</label>
                                        <select name="lga" id="lga" class="form-control">
                                            <option value="">Select Local Gvt.</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="card row">
                                    <h3 class="lead">Advert Information</h3>
                                    <div class="form-group">
                                        <label for="name">Title</label>
                                        <input type="text" name="title" class="form-control" placeholder="Please write a clear title for your item">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Product Category</label>
                                        <select name="category" id="cat" class="form-control">
                                            <option value="">Select Category.</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6" style="padding-left: 0px">
                                        <label for="name">Price</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">&#8358;</span>
                                            <input type="text" name="price" class="form-control" aria-label="Amount (to the nearest Naira)" placeholder="Enter Price">
                                            <span class="input-group-addon">.00</span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Price Type</label>
                                        <select name="price_type" id="price_type" class="form-control">
                                            <option value="">Select Pricing Type</option>
                                            <option value="Negotiable">Negotiable</option>
                                            <option value="contact_for_price">Contact for Price</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Description</label>
                                        <textarea name="description" id="desc"  rows="6" class="form-control" placeholder="Please provide a detailed description. You can mention as many details as possible. It will make your ad more attractive for buyers."></textarea>
                                    </div>
                                </div>

                                <div class="card row">
                                    <div class="form-group">
                                        <input type="submit" name="submit" value="Create Free AD" class="btn btn-primary ">
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div><!-- panel -->

                </div><!-- col-md-10 -->

            </div><!-- row -->
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@endsection
@section('ajax')
    @include('frontend.includes.ajax')
@endsection