@extends('frontend.layouts.master')

@section('content')

    <div class="col-md-12">
        <form action="">
            <div class="form-group">
                <!--<div class="col-md-10 col-md-offset-1">-->
                <!--    <div class="well">-->
                <!--        <div class="input-group input-group-lg">-->
                <!--            <input type="text" name="search" class="form-control input-lg" placeholder="Search by name, City" aria-describedby="basic-addon2">-->
                <!--            <span class="input-group-addon" id="basic-addon2"><button class="btn btn-xs btn-danger"><i class="fa fa-search"></i></button></span>-->
                <!--        </div>-->
                <!--    </div>-->

                <!--</div>-->
            </div>
        </form>
    </div>
    <div class="total-ads main-grid-border">
        <div class="container">
            <ol class="breadcrumb" style="margin-bottom: 5px;">
                <li><a href="{{ url("/") }}">Home</a></li>
                <li><a href="{{ url("user/advert") }}">My Advert</a></li>
            </ol>
            <div class="ads-grid">
                <div class="side-bar col-md-3">
                    <div class="panel-body ard">
                                    @if($featuredAd->isEmpty())
                                        <p class="alert alert-warning">something Awesome is Coming</p>
                                    @else
                                        @foreach($featuredAd as $ad)
                                            <div class="card" style="margin-bottom:9px;">
                                                <a href="{{ url($ad->url) }}" class="">
                                                    <div class="featured-ad-left" style="margin-right:3%;">
                                                        <img src="/{{ $ad->img_url }}" title="ad image" alt="" />
                                                    </div>
                                                    <div class="featured-ad-right">
                                                        <h4 class="text-muted">{{ $ad->title }}</h4>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </a>
                                                <p  style="padding: 0px; margin: 0px;;"><a href="{{ url("#") }}" class="btn btn-info btn-xs btn-block">Read More</a></p>

                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                </div>
                <div class="ads-display col-md-9">
                    <div class="wrapper">
                        <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">
                                        <span class="text">My Adverts</span>
                                    </a>
                                </li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                                    <div>
                                        <div id="container">
                                            <div class="clearfix"></div>
                                            @if($adverts->isEmpty())
                                                <p class="alert alert-warning text-center text-muted">No advert Created Yet</p>
                                            @else
                                            @if(auth()->user()->user_type == 'buyer')
                                                <ul class="list">
                                                    @foreach($adverts as $advert)
                                                        <a href="http://savycon.com/single/advert/{{ $advert->id }}">
                                                            <li>
                                        @if(!$advert->photos->first() == null)
                                        <img src="/assets/Product/{{ $advert->photos->first()->filename }}" title="" alt="" />
                                        @else
                                        <img src="{{ url("/download.png") }}" title="" alt="" />
                                        @endif
                                        <section class="list-left">
                                                                    <h5 class="title">{{$advert->title }}</h5>
                                                                    <span class="adprice">&#8358;{{$advert->price }}</span>
                                                                    <p class="catpath">{{$advert->category }}</p>
                                                                </section>
                                                                <section class="list-right">
                                                                    <span class="date">{{$advert->created_at->format('y M D') }}</span>
                                                                    <span class="cityname">{{$advert->state }}</span>
                                        <a class="btn btn-info" href="/user/Edit-Ad/{{$advert->id}}">Edit</a>
                                        <a class="btn btn-danger" href="/ad/delete/{{ $advert->id }}">Delete</a></a>
                                                                </section>
                                                                <div class="clearfix"></div>
                                                            </li>
                                                        </a>
                                                    @endforeach
                                                </ul>
                                                
                                                @else
                                               
                                               
                                               
                                               <ul class="list">
                                                    @foreach($adverts as $advert)
                                        @if(auth()->user()->user_type == 'buyer')
                                        <a href="{{ url("single/advert/$advert->id") }}">
                                        @else
                                        <a href="{{ url("single/freelance/$advert->id") }}">
                                        @endif
                                        <li>
                                        @if(!empty($advert->img_url))
                                        <img src="/{{ $advert->img_url }}" title="" alt="" />
                                        @else
                                        <img src="{{ url("/download.png") }}" title="" alt="" />
                                        @endif
                                        <section class="list-left">
                                                                    <h5 class="title">{{$advert->title }}</h5>
                                                                    <span class="adprice">&#8358;{{$advert->price }}</span>
                                                                    <p class="catpath">{{$advert->category }}</p>
                                                                </section>
                                                                <section class="list-right">
                                                                    <span class="date">{{$advert->created_at->format('y M D') }}</span>
                                                                    <span class="cityname">{{$advert->state }}</span>
                                        <a class="btn btn-info" href="/user/Edit-Ad/{{$advert->id}}">Edit</a>
                                        <a class="btn btn-danger" href="/ad/delete/{{ $advert->id }}">Delete</a></a>
                                                                </section>
                                                                <div class="clearfix"></div>
                                                            </li>
                                                        </a>
                                                    @endforeach
                                                </ul>
                                               
                                               
                                               
                                               
                                               
                                               
                                                
                                                @endif
                                            @endif
                                            <div>
                                                {!! $adverts->render() !!}
                                            </div>
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
@endsection
