@extends('frontend.layouts.master')
@section('facebook')



<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@savycon">
<meta name="twitter:creator" content="@savycon">
<meta name="twitter:title" content="{{ $freelance->title }}">
<meta name="twitter:description" content="{{ $freelance->description }}">
<meta name="twitter:image" content="http://savycon.com/{{ $images[0] }}">

<meta property="og:url" content="http://savycon.com/single/freelance/248">
<meta property="og:type" content="website">
<meta property="og:title" content="{{ $freelance->title }}">
<meta property="og:description" content="{{ $freelance->description }}">
<meta property="og:image" content="{{ url("$images[0]")}}">
<meta property="og:image:width" content="200">
<meta property="og:image:height" content="200">


<title>{{ $freelance->description }}</title>


@endsection
@section('content')

        <!--single-page-->
<div class="single-page main-grid-border">
    

    <div class="container">
        <ol class="breadcrumb" style="margin-bottom: 5px;">
            <li><a href="{{ url("/") }}">Home</a></li>
            <li class="active">{{ $freelance->title }}</li>
        </ol>
  
        <a class="twitter-share-button  btn-sm btn-info"
          href="https://twitter.com/intent/tweet?text=http://savycon.com/single/freelance/{{ $freelance->id }}"
          data-size="large">
        <i class="fa fa-twitter"></i>Tweet</a>
                    
        <a class="twitter-share-button  btn-sm btn-info" style="background-color: #3b5998 !important;" href="http://www.facebook.com/sharer.php?s=100&p[title]={{ $freelance->title }}&p[summary]={{ $freelance->description }}&p[url]=http://savycon.com/single/freelance/{{$freelance->id}}&p[images][0]=savycon.com/{{$freelance->img_url}}">
            <i class="fa fa-facebook"></i> Facebook
        </a>
        
        
 
            
         
            


            
        <div class="product-desc">
            
            
            <div class="col-md-7 product-view" style="height: 780px;">
                <h2>{{ $freelance->title }}</h2>
                <p> <i class="glyphicon glyphicon-map-marker"></i><a href="#">State: {{ $freelance->state }}</a>, <a href="#"> Address: {{ $freelance->address }}, City: {{$freelance->lga}} </a>| Added  {{ $freelance->created_at->diffForHumans() }}</p>
                <div class="flexslider">
                    <ul class="slides">
                        @foreach($images as $photo)
                            @if(!empty($photo))
                            <li data-thumb="{{ url("$photo") }}">
                                <img src="{{ url("$photo")}}" />
                            </li>
                            @else
                            <li data-thumb="http://savycon.com/download.png">
                                <img src="http://savycon.com/download.png" />
                            </li>
                            @endif
                        @endforeach
                    </ul>
                </div>

                <!-- //FlexSlider -->
                <div class="product-details">
                    <p>{{ $freelance->title }}</p>
                    <p><strong>Summary</strong> :
                        {{ $freelance->description }}
                    </p>
                    <p><i class="glyphicon glyphicon-map-marker"></i>{{ $freelance->lga.", ".$freelance->state }}</p>

                </div>
                <div class="product-details">
                    <div id="map" style="background-color: lightblue; height: 390px; margin-top: 15px;"class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    
                </div>
                <input type="hidden" value="{{ $freelance->lga}}, {{ $freelance->state }}" id="txtAddress" name="txtAddress">
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
		var address = '{{ $freelance->address }} {{ $freelance->lga }}, {{ $freelance->state }}';

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
			  title: '{{ $freelance->lga }}, {{ $freelance->state }}'
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
                        <h3 class="rate">&#8358;{{ $freelance->price }}</h3>
                        <div class="clearfix"></div>
                    </div>
                    <div class="condition">
                        <p class="p-price">Type</p>
                        <h5 class="text-info" style="text-transform: capitalize">{{ $freelance->price_type }}</h5>
                        <div class="clearfix"></div>
                    </div>
                    <div class="itemtype">
                        <p class="p-price">Job Type</p>
                        <h4>{{$freelance->category }}</h4>
                        <div class="clearfix"></div>
                    </div>
                </div>
                
               
                <div class="interested text-center bg-info">
                    <div class="row">
                        <h4>Interested in this Ad?<small> Contact the Seller!</small></h4>
                        @if($freelance->phone == '')
                        <p class="col-md-">
                            <i class="glyphicon glyphicon-earphone"></i>
                            {{ $freelance->user->phone }}
                        </p>
                        @else
                        <p class="col-md-">
                            <i class="glyphicon glyphicon-earphone"></i>
                            {{ $freelance->phone }}
                        </p>
                        @endif
                        <p class="col-md-"><i class="glyphicon glyphicon-envelope"></i>{{ $freelance->user->email }}</p>
                        <p class="col-md-"><i class="glyphicon glyphicon-map-marker"></i>{{ $freelance->address }} {{ $freelance->lga.", ".$freelance->state }}</p>
                    </div>

                </div>
                
                <div class="tips">
                    <h4>Safety Tips for Buyers</h4>
                    <ol>
                        <li><a href="#">Users to confirm the credibility of clients through reviews.</a></li>
                        <li><a href="#">Allow the freelancer to finish work before payment, important.</a></li>
                        <li><a href="#">Do not pay before service.</a></li>
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
                <input type="hidden" value="{{ $freelance->id }}" name="user_id">
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