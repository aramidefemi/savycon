@extends('frontend.layouts.master')
@section('facebook')
    <link rel="image_src" href="https://savycon.com/{{$product->img_url}}"/>
    
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@savycon">
    <meta name="twitter:creator" content="@savycon">
    <meta name="twitter:title" content="{{ $product->title }}">
    <meta name="twitter:description" content="{{ $product->description }}">
    
    @if($product->photos[0]->filename != '')
        <meta name="twitter:image" content="{{ url("assets/Product/" .$product->photos[0]->filename) }}">
    @else
        <meta name="twitter:image" content="http://savycon.com/download.png">
    @endif
    <title>{{ $product->title }}</title>  
    
    
    

@endsection
@section('content')

        <!--single-page-->
<div class="single-page main-grid-border">

    <div class="container">
        <ol class="breadcrumb" style="margin-bottom: 5px;">
            <li><a href="{{ url("/") }}">Home</a></li>
            <li class="active">{{ $product->title }}</li>
        </ol>

        <a class="twitter-share-button  btn-sm btn-info"
          href="https://twitter.com/intent/tweet?text=http://savycon.com/single-advert/{{ $product->id }}"
          data-size="large">
        <i class="fa fa-twitter"></i>Tweet</a>
                    
        <a class="twitter-share-button  btn-sm btn-info" style="background-color: #3b5998 !important;" href="http://www.facebook.com/sharer.php?s=100&p[title]={{ $product->title }}&p[summary]={{ $product->description }}&p[url]=http://savycon.com/single-advert/{{$product->id}}&p[images][0]=https://savycon.com/{{$product->img_url}}">
            <i class="fa fa-facebook"></i> Facebook
        </a>

            
         
            


            
        <div class="product-desc">
            
            <div class="col-md-7 product-view" style="height: 780px;">
                <h2>{{ $product->title }}</h2>
                <p> <i class="glyphicon glyphicon-map-marker"></i><a href="#">State: {{ $product->state }}</a>, <a href="#"> Address: {{ $product->address }}, City: {{$product->lga}} </a>| Added  {{ $product->created_at->diffForHumans() }}</p>
                @if(auth()->user()->user_type == 'buyer')
                <div class="flexslider">
                    @if($product->photos->last() == null)
                          <img src="{{ url("download.png") }}"  class="img-rounded img-responsive text-center" alt="No images" }}" style="height: 105px;">
                    @else
                    <ul class="slides">
                        @foreach($product->photos as $photo)
                            <li data-thumb="{{ url("assets/Product/" .$photo->filename) }}">
                                <img src="{{ url("assets/Product/" .$photo->filename) }}" />
                            </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                @else
                <div class="flexslider">
                    <div class="flexslider">
                        @if(empty($product->img_url))
                              <img src="{{ url("download.png") }}"  class="img-rounded img-responsive text-center" alt="No images" style="height: 105px;">
                        @else
                        <ul class="slides">
                      
                                <li data-thumb="/{{ $product->img_url }}">
                                    <img src="/{{ $product->img_url }}" height="40" />
                                </li>
                    
                        </ul>
                    @endif
                    </div>
                </div>
                @endif

                <!-- //FlexSlider -->
                <div class="product-details">
                    <p>{{ $product->title }}</p>
                    <p><strong>Summary</strong> :
                        {{ $product->description }}
                    </p>
                    <p><i class="glyphicon glyphicon-map-marker"></i>{{ $product->lga.", ".$product->state }}</p>

                </div>
                <div class="product-details">
                    <div id="map" style="background-color: lightblue; height: 390px; margin-top: 15px;"class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    
                </div>
                <input type="hidden" value="{{ $product->lga}}, {{ $product->state }}" id="txtAddress" name="txtAddress">
<input type="hidden" disabled placeholder="lat coordinate" id="txtLatitude" name="txtLatitude">
<input type="hidden" disabled placeholder="long coordinate"  id="txtLongitude" name="txtLongitude">
                <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyBvMaYqVNK0bMiIEGsY9KSMv-FjtNngZVc&sensor=false"></script>
<!-- Google Maps End -->
<script type="text/javascript" src="https://savycon.com/assets/js/jquery.min.js"></script>
<script type="text/javascript">

    $(document).ready(function () {
        initMap1();
        initMap2();
        GetLatLong();
        
    });

    function initMap1() {
        googleMap = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 37.7749295, lng: -122.4194155},
          zoom: 8
        });
    }       

    function initMap2() {
        googleMap2 = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 9.072264, lng: 7.491302},
          zoom: 8
        });
    }       

    function rad(x) {
      return x * Math.PI / 180;
    }
    
    function CalculateDistance(p1, p2){
        var R = 6378137; // Earthâ€™s mean radius in meter
        var dLat = rad(p2.lat() - p1.lat());
        var dLong = rad(p2.lng() - p1.lng());
        var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
        Math.cos(rad(p1.lat())) * Math.cos(rad(p2.lat())) *
        Math.sin(dLong / 2) * Math.sin(dLong / 2);
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        var d = R * c;
        return d; // returns the distance in meter
    }
    
    function GetLatLong() {
        var geocoder = new google.maps.Geocoder();
        var address = '{{ $product->address }} {{ $product->lga }}, {{ $product->state }}';

        geocoder.geocode( { 'address': address}, function(results, status) {

        if (status == google.maps.GeocoderStatus.OK) {
            var latitude = results[0].geometry.location.lat();
            var longitude = results[0].geometry.location.lng();
            //alert(latitude+' '+longitude);
            $("#txtLatitude").val(latitude.toString());
            $("#txtLongitude").val(longitude.toString());
            
            var myLatLng = {lat: latitude, lng: longitude};
            
            var mapProp= {
                center:new google.maps.LatLng(latitude,longitude),
                zoom:13,
            };
            var map=new google.maps.Map(document.getElementById("map"),mapProp);                

            var marker = new google.maps.Marker({
              position: myLatLng,
              map: map,
              title: '{{ $product->lga }}, {{ $product->state }}'
            });         
            
          } 
        });
        
    };

    function LatLongToAddress() {

        var latitude = parseFloat($("#txtLatitude2").val());
        var longitude = parseFloat($("#txtLongitude2").val());
        
        var geocoder  = new google.maps.Geocoder(); // create a geocoder object
        var location  = new google.maps.LatLng(latitude, longitude);    // turn coordinates into an object          
        geocoder.geocode({'latLng': location}, function (results, status) {
            if(status == google.maps.GeocoderStatus.OK) {           // if geocode success
                var address=results[0].formatted_address;         // if address found, pass to processing function
                $("#txtAddress2").val(address.toString());
                document.write(address);
                
                var myLatLng = {lat: latitude, lng: longitude};
                
                var mapProp= {
                    center:new google.maps.LatLng(latitude,longitude),
                    zoom:13,
                };
                var map=new google.maps.Map(document.getElementById("map"),mapProp);                

                var marker = new google.maps.Marker({
                  position: myLatLng,
                  map: map,
                  title: 'Your Address'
                });         
                
            };
        });
    };

        
    function getLatLngFromString(lat, lng) {

        var latLng = new google.maps.LatLng(parseFloat(lat), parseFloat(lng));
        return latLng;
    };
    
    
</script>
                </div>

                
            </div>
            <br><br>
            
            <div class="col-md-5 product-details-grid">
                <div class="item-price">
                    <div class="product-price">
                        <p class="p-price">Price</p>
                        <h3 class="rate">&#8358;{{ $product->price }}</h3>
                        <div class="clearfix"></div>
                    </div>
                    <div class="condition">
                        <p class="p-price">Type</p>
                        <h5 class="text-info" style="text-transform: capitalize">{{ $product->price_type }}</h5>
                        <div class="clearfix"></div>
                    </div>
                    <div class="itemtype">
                        <p class="p-price">Job Type</p>
                        <h4>{{$product->category }}</h4>
                        <div class="clearfix"></div>
                    </div>
                </div>
                
               
                <div class="interested text-center bg-info">
                    <div class="row">
                        <h4>Interested in this Ad?<small> Contact the Seller!</small></h4>
                        @if($product->phone == '')
                        <p class="col-md-">
                            <i class="glyphicon glyphicon-earphone"></i>
                            {{ $product->user->phone }}
                        </p>
                        @else
                        <p class="col-md-">
                            <i class="glyphicon glyphicon-earphone"></i>
                            {{ $product->phone }}
                        </p>
                        @endif
                        <p class="col-md-"><i class="glyphicon glyphicon-envelope"></i>{{ $product->user->email }}</p>
                        <p class="col-md-"><i class="glyphicon glyphicon-map-marker"></i>{{ $product->address }} {{ $product->lga.", ".$product->state }}</p>
                    </div>

                </div>
                
                <div class="tips">
                    <h4>Safety Tips for Seller/buyers/Professionals</h4>
                    <ol>
                        <li><a href="#">Do not acept job/offer that is against the law.</a></li>
                        <li><a href="#">Do not work in an unsecured places or unknown places.</a></li>
                        <li><a href="#">Do not work beyond the agreed location.</a></li>
                    </ol>
                </div>
                
                 @if(!$messages->isEmpty())
                <div class="tips" style="opacity: 0.7 !important; max-height: 600px !important; overflow-y: auto !important;">
                    <h1 style="opacity: 0.8 !important;">Discussions</h1><br>
                    @foreach($messages as $single)
                    <small><i class="fa fa-envelope"></i> {{ $single->email }}</small><br>
                    <small><i class="fa fa-phone"></i> {{ $single->phone }}</small>
                    <h4 style="opacity: 0. !important;"><i class="fa fa-comment"></i> {{ $single->message }}</h4>
                    <ul style="color: black;">
                        @foreach($all_replies as $replies)
                        @if($replies->m_id == $single->id)
                        <li style="margin-left: 30px; margin-top: -10px; margin-bottom: -15px;"><i class="fa fa-reply"></i>
                            {{ $replies->reply }}
                        </li>
                        <hr>
                        
                        @endif
                        
                        @endforeach
                    </ul>
                    @endforeach
                </div>
                @endif
                
                
                <div class="interested text-center bg-info">
                    <div class="row">
                <form action="/send/message" method="post" enctype="multipart/form-data">
                {{ csrf_field()  }}
                <input type="hidden" value="{{ $product->id }}" name="user_id">
                    @if(Auth::guest())
                    
                    <div class="col-md-12">
                      <label class="col-md-12 control-label" for="phone" style="margin: 7px;">
                          Phone Number
                       </label>
                        <input type="number" name="phone" required placeholder="Enter phone number" class="form-control">
                    </div>
                    <div class="col-md-12">
                      <label class="col-md-12 control-label" for="email" style="margin: 7px;">
                          Email
                       </label>
                        <input type="email" required name="email" placeholder="Enter email address" class="form-control">
                    </div>
                    
                    @else
                    <input type="hidden" value="{{ auth()->user()->email }}" name="email">
                    <input type="hidden" value="{{ auth()->user()->phone }}" name="phone">
                        
                    @endif
                    
                     <div class="col-md-12">
                      <label class="col-md-12 control-label" for="title" style="margin: 7px;">
                          Send message
                       </label>
                        <textarea name="message" required placeholder="Type message here" class="form-control">
                            
                        </textarea>
                  </div>
                <br>
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="submit" name="submit" value="Send Message" class="btn btn-info ">
                    </div>
                </div>
            </form>
                </div>
                </div>
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
                animation: "slide",
                controlNav: "thumbnails"
            });
        });
    </script>
    
@endsection