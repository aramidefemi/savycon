@extends('frontend.layouts.master')

@section('content')
<div id="constainer">                       


<div class="input-group col-lg-offset-3 col-xl-offset-3 col-lg-6 col-xl-6 col-md-12 col-xs-12">
                                        <select name="category" id="state" class="form-control to">
                                            <option value="">Choose state</option>
                                            @foreach($states as $state)
                                                <option value="{{ $state->name }}">{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                       
                                    </div>
                                                <div class="clearfix"></div>
                                                @if($freelancers->isEmpty())
                                                    <p class="alert alert-warning">No FreeLancer Available Yet For This Category</p>
                                                @else
                                                    <ul class="card" style="display: block">
                                                        <h4 class="text-muted" style="color:#fff !important; font-weight:500; padding: 10px; margin-top: 10px; background: #f3c500; text-align: center;">{{ $category }}</h4>
                                                        <hr>
                                                        <div id="zone">
                                                        @foreach ($freelancers->chunk(2) as $chunk)
                                                            <div class="row">
                                                                @foreach ($chunk as $freelancer)
                                                                    <div class="col-sm-6 col-md-6 col-xs-6" id="zone">
                                                                        
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
<script type="text/javascript" src="{{ url("assets/js/jquery.min.js") }}"></script>
<script>


    $( "#state" ).change(function() {
       var url = '/freelancer/get/' + $('#state').val()+'/{{ $category }}';
       
        $.get(url, function success(response) {
            var freelancers = JSON.parse(response);
            if(freelancers.length > 0)
            {
            var content = "";
            var i;
            for(i = 0; i < freelancers.length; i++)
            {
                
                content += '<div class="thumbnail">\
                <img src="http://savycon.com/'+freelancers[i].img_url+'" class="img-rounded im\
g-responsive" alt="images" style="width:135px; height: 105px;">\
                <div class="caption text-center ">\
                <h6 class="title" style="font-size: 20px !important">Title:\ '+freelancers[i].title+'</h6>\
                <span class="adprice" style="font-size: 12px !important">\
    Price: &#8358;'+freelancers[i].price+'</span>\
    <p class="catpath">Category: '+freelancers[i].category+'</p>\
    <span class="date" style="font-size:9px">Date: <strong> \
    '+freelancers[i].created_at+'</strong></span>\
    <span class="cityname" style="font-size: 12px !important">\
    <strong>Location:\
    </strong> '+freelancers[i].lga+', '+freelancers[i].state+'</span>\
    <p><a href="http://savycon.com/single/freelance/'+freelancers[i].id+'"\ class="btn btn-info btn-block btn-xs" role="button">Get Info</a>\
    </p>\
                </div></div>\
                                        ';
            }
            $('#zone').html(content);
            }    
        });
    });


</script>
@endsection