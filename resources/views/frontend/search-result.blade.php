@extends('frontend.layouts.master')

@section('content')
    <style>
        @media (max-width: 420px){
            .date{
                font-size: 9px;
            }
            .to{
                font-size: 9px !important;
            }
        }
    </style>
        <!-- content-starts-here -->
<div class="content">
    <div class="col-md-12" style="margin-top: 40px;">
        <form action="{{ url("search/results") }}" method="GET" role="form">
            <div class="input-group col-md-12">
                <div class="col-md-1s" style="margin-top: 40px;">
                    <form action="{{ url("search/results") }}" method="GET" role="form">
                        <div class="input-group col-md-12">
                            <div class="col-md-9 col-xs-7">
                                <input type="text" name="q" class="form-control to" placeholder="Automobile Mechanic Repairer">
                            </div>
                            <div class="input-group col-md-2 col-xs-5">
                                <select name="category" id="category" class="form-control to">
                                    <option value="">State</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->name }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-btn">
                                    <button class="btn btn-danger" type="submit"><span class="fa fa-search"></span></button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </form>
    </div>
    <div class="total-ads main-grid-border">
        <div class="container">

            <div class="ads-grid">
                <div class="side-bar col-md-3">
                    <div class="featured-ads">
                        <h2 class="sear-head fer">Featured Ads</h2>
                        <hr>
                        @if($featuredAd->isEmpty())
                            <p class="alert alert-warning">something Awesome is Coming</p>
                        @else
                            @foreach($featuredAd as $ad)
                                <div class="card" style="margin-bottom: 20px;;">
                                    <a href="{{ url("http://".$ad->url) }}" class="">
                                        <div class="featured-ad-left" style="margin-right:3%;">
                                            <img src="<?php echo url(explode(',',$ad->img_url)['0']) ?>" title="ad image" alt="" />
                                        </div>
                                        <div class="featured-ad-right">
                                            <h4 class="text-muted">{{ $ad->title }}</h4>
                                        </div>
                                        <div class="clearfix"></div>
                                    </a>
                                    <br>
                                    <p  style="padding: 0px; margin: 0px;"><a href="{{ url("http://".$ad->url) }}" target="_blank" class="btn btn-info btn-xs btn-block">Read More</a></p>
                                </div>
                            @endforeach
                        @endif
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="ads-display col-md-9">
                    <div class="wrapper">
                        <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                            <div id="myTabContent" class="tab-content" style="border: 1px solid transparent !important">
                                <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                                    <div>
                                        <div id="container">
                                            <div class="clearfix"></div>
                                            <ul class="list">
                                                @if($adverts->isEmpty())
                                                    <p class="alert alert-warning">No search Match your Keyword try other category</p>
                                                @else
                                                    @foreach($adverts->chunk(2) as $chunk)
                                                        <div class="row">
                                                            @foreach ($chunk as $advert)
                                                                <div class="col-md-6 col-xs-6">
                                                                    <a href="{{ url("single/freelance/$advert->id") }}">

                                                                        <div class="thumbnail">
                                                                            <img src="<?php echo  url(explode(',',$advert->img_url)['0']) ?>"  class="img-rounded img-responsive" alt="" style="height: 108px;">
                                                                            <div class="caption text-center ">
                                                                                <h6 class="title">{{$advert->title }}</h6>
                                                                                <span class="adprice">&#8358;{{$advert->price }}</span>
                                                                                <p class="catpath">{{$advert->category_name }}</p>
                                                                                <span class="date"><strong>{{$advert->created_at->format('d:m:Y|h:i') }}</strong></span>
                                                                                <span class="cityname"><strong>City:</strong>{{$advert->state }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </a>

                                                                </div>
                                                            @endforeach
                                                        </div>

                                                    @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                        <div>
                                            @if( ! $adverts->isEmpty())
                                                {!! $adverts->render() !!}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
@endsection
