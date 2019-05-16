@extends('frontend.layouts.master')

@section('content')
<div id="constainer">                       

        
        @if($freelancers->isEmpty())
            <p class="alert alert-warning">No FreeLancer Available Yet For This Category</p>
        @else
            <ul class="card" style="display: block">
                <h4 class="text-muted" style="color:#fff !important; font-weight:500; padding: 10px; margin-top: 10px; background: #f3c500; text-align: center;">{{ auth()->user()->name }}</h4>
                <hr>
                <div id="zone">
                @foreach ($freelancers->chunk(2) as $chunk)
                    <div class="row">
                        @foreach ($chunk as $freelancer)
                            <div class="col-sm-12 col-md-6 col-xs-12" id="zone">
                                
<div class="thumbnail">
<img src="http://savycon.com/<?php echo $img = explode(',',$freelancer->img_url)['0'] ?>"  class="img-rounded img-responsive" alt="images" style="width:135px; height: 105px;">
                                    <div class="caption text-center ">
                                        <h6 class="title" style="font-size: 20px !important">Title: {{$freelancer->title }}</h6>
                                        <span class="adprice" style="font-size: 12px !important">Price: &#8358;{{$freelancer->price }}</span>
                                        <p class="catpath">Category: {{$freelancer->category }}</p>
                                        <span class="date hidden-xs">Date: <strong> {{$freelancer->created_at->format('d:m:Y|h:i') }}</strong></span>
                                        <span class="date visible-xs" style="font-size:9px">Date: <strong> {{$freelancer->created_at->format('d:m:Y|h:i') }}</strong></span>
                                        <span class="cityname hidden-xs" style="font-size: 12px !important"><strong>Location: </strong> {{$freelancer->lga }}, {{ $freelancer->state }}</span>
                                        <span class="cityname visible-xs" style="font-size:12px"><strong>Location: </strong> {{$freelancer->user->lga }}, {{ $freelancer->state }}</span>
                                        <p>
                                            <a href="{{ url("single/freelance/$freelancer->id") }}" class="btn btn-info btn-block btn-xs" role="button">Get Info</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
                </div>
            </ul>
        @endif
    </div>

@endsection