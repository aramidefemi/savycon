@extends('frontend.layouts.master')

@section('content')
        <!--single-page-->
<div class="single-page main-grid-border">
    <div class="container">
        <ol class="breadcrumb" style="margin-bottom: 5px;">
            <li><a href="{{ url("/") }}">Home</a></li>
            <li class="active">{{ auth()->user()->email }}</li>
        </ol>
        <div class="product-desc">
            <div class="col-md-7 product-view card">
                <h2>{{ $data['details']->title }}</h2>
                <hr>
                <p> <i class="glyphicon glyphicon-map-marker"></i><a href="#">State: {{ auth()->user()->state }}</a>, <a href="#">city: {{ auth()->user()->lga }}</a>| Added  {{ auth()->user()->created_at->diffForHumans() }}</p>
                <div class="flexslider">
                    <ul class="slides">
                        @foreach($data['images'] as $photo)
                            <li data-thumb="{{ url($photo)}}">
                                <img src="{{ url($photo)}}" alt="photo" />
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- //FlexSlider -->
                <div class="product-details">
                    <p>{{$data['details']->category }}</p>
                    <p><strong>Summary</strong> :
                        {{ $data['details']->description }}
                    </p>

                </div>
            </div>
            <div class="col-md-5 product-details-grid">
                <div class="card" style="padding-top: 12px;">
                    <ul class="media-list ">
                        <li class="media">
                            <div class="media-left" style="position: relative; top: 8px;">
                                <i class="fa fa-user fa-3x"></i>
                            </div><!--media-left-->

                            <div class="media-body">
                                <h4 class="media-heading">
                                    {{ auth()->user()->name }}<br/>
                                    <small>
                                        {{ auth()->user()->email }}<br/>
                                        Joined {{ auth()->user()->created_at->format('F jS, Y') }}
                                        <br>
                                        <strong>Member Type:</strong> <span  style="text-transform: capitalize">{{ auth()->user()->user_type }}</span>
                                    </small>

                                </h4>
                                @permission('view-backend')
                                <a href="{{ route("backend.dashboard") }}" class="btn btn-danger btn-xs">Administration Section</a>
                                @endauth
                            </div><!--media-body-->
                        </li><!--media-->
                    </ul><!--media-list-->

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Feautured Ads</h4>
                        </div><!--panel-heading-->

                        <div class="panel-body">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                        </div><!--panel-body-->
                    </div><!--panel-->
                </div><!--col-md-4-->

            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--//single-page-->

@endsection
@section('js-after')
    <script type="text/javascript" src="{{ url("assets/js/jquery.flexisel.js") }}"></script>
    <script defer src="{{ url("assets/js/jquery.flexslider.js") }}"></script>
    <script>
        // Can also be used with $(document).ready()
        $(window).load(function() {
            $('.flexslider').flexslider({
                animation: "fade",
                controlNav: "thumbnails"
            });
        });
    </script>
@endsection