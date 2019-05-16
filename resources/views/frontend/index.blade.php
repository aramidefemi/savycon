<?php
 echo "better leave me";
?>


<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<head>

 <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TTQVJ4V');</script>
<!-- End Google Tag Manager -->


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- SITE META -->
    {{--  <title>SavyCon-Get your Job/work done, A place to meet professional near you.</title>  --}}
    <title>og lordddd.</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <!-- FAVICONS -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
 

    <!-- TEMPLATE STYLES -->
    <link rel="stylesheet" type="text/css" href="https://savycon.com/catalog-full/catalog-app/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://savycon.com/catalog-full/catalog-app/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://savycon.com/catalog-full/catalog-app/style.css">

    <!-- CUSTOM STYLES -->
    

    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <style type="text/css">
    @media only screen and (min-width: 1000px) {
        #zone { margin-left: 80px;}
        #freelancerBox, #buyerBox {
            margin-left: 25px;
        }
       /* #overall {
            height: 500px;
        }*/
        #central-grid {
            
        }
    }


    @media only screen and (max-width: 700px) {
        #freelancerBox , #buyerBox {
            margin-left: 18px;
        }
    }




    #top-link:hover{
        color: #01a185 !important;
    }
    </style>
</head>
<body style="background: white !important;">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TTQVJ4V"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


    <!-- START SITE -->
    <div id="wrapper">
        <header class="header">
            <div class="container-menu">
                <nav class="navbar navbar-default yamm">
                    <div class="container">
                        <div class="navbar-table">
                            <div class="navbar-cell">
                                <div class="navbar-header">
                              <a href="{{ url("/") }}" style="color: #01a185; font-size: 45px; margin-left: -30px;"><span><img src="{{ url("assets/images/logo.png") }}" style="width:60px"/></span><span style="color: rgb(243, 197, 0); margin-left: -15px;">avy</span>
                                <span style="color: #01a185 !important; margin-left: -14px;" id="top-link">con</span></a>

                                    <div class="open-menu">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="fa fa-bars"></span>
                                        </button>
                                    </div>
                                </div><!-- end navbar-header -->
                            </div><!-- end navbar-cell -->
                            <div class="navbar-cell stretch">
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                                    <div class="navbar-cell">
                                        <ul class="nav navbar-nav navbar-center">
                                            <li><a class="active" href="/" title="">Home</a></li>
                                            <li class="dropdown megamenu yamm-half hovermenu"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Services <b class="fa fa-angle-down"></b></a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                    <div class="yamm-content">
                                                        <div class="row">
                                                            <div class="col-md-3 col-lg-3 col-sm-6">
                                                                <div class="box">
                                                                    <ul>
                                                                        @for($i = 0; $i < 15; $i++)
                                                                        <li>
                                                                             <a href="/single-category/{{ $the_cat[$i]->name }}">{{ $the_cat[$i]->name }}
                                                                             </a>
                                                                        </li>
                                                                        @endfor
                                                                     </ul>
                                                                </div><!-- end box -->
                                                            </div><!-- end col -->
                                                            <div class="col-md-3 col-lg-3 col-sm-6">
                                                                <div class="box">
                                                                    <ul>
                                                                        @for($i = 15; $i < 30; $i++)
                                                                        <li>
                                                                             <a href="/single-category/{{ $the_cat[$i]->name }}">{{ $the_cat[$i]->name }}
                                                                             </a>
                                                                        </li>
                                                                        @endfor
                                                                     </ul>
                                                                </div><!-- end box -->
                                                            </div><!-- end col -->
                                                            <div class="col-md-3 col-lg-3 col-sm-6">
                                                               <div class="box">
                                                                    <ul>
                                                                        @for($i = 30; $i < 45; $i++)
                                                                        <li>
                                                                             <a href="/single-category/{{ $the_cat[$i]->name }}">{{ $the_cat[$i]->name }}
                                                                             </a>
                                                                        </li>
                                                                        @endfor
                                                                     </ul>
                                                                </div><!-- end box -->
                                                            </div><!-- end col -->
                                                            <div class="col-md-3 col-lg-3 col-sm-6">
                                                               <div class="box">
                                                                    <ul>
                                                                        @for($i = 45; $i < 59; $i++)
                                                                        <li>
                                                                             <a href="/single-category/{{ $the_cat[$i]->name }}">{{ $the_cat[$i]->name }}
                                                                             </a>
                                                                        </li>
                                                                        @endfor
                                                                     </ul>
                                                                </div><!-- end box -->
                                                            </div><!-- end col -->
                                                        </div>
                                                    </div><!-- end ttmenu-content -->
                                                    </li>
                                                </ul>
                                            </li><!-- end mega menu -->
                                            
                                           <!--  <li><a href="forum.html" title="">Forum</a></li>
                                            <li><a href="blog.html" title="">Blog</a></li> -->
                                            <li><a href="/contact-us" title="">Contact Us</a></li>
                                        </ul>
                                        <ul class="nav navbar-nav navbar-right">
                                            <li class="dropdown membermenu hovermenu">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="https://savycon.com/catalog-full/catalog-app/upload/member.png" alt="" class="img-circle">{{ auth()->user() ? auth()->user()->email : 'Guest' }} <span class="caret"></span></a>
                                                <ul class="dropdown-menu">
                                                    @if(auth()->user())
                                                    <li class="dropdown-header">VIEW</li>
                                                    <li><a href="/auth/password/change">Account settings</a></li>
                                                    
                                                    <li><a href="/dashboard">Dashboard</a></li>

                                                    <li><a href="{{ url("new-advert") }}">Create Ad</a></li>
                                                    <li><a href="/auth/logout">Sign Out</a></li>
                                                    @else
                                                    <li><a href="/auth/login">Login</a></li>
                                                    <li><a href="{{ url("get-started/register/") }}">Register</a></li>
                                                    @endif
                                                </ul>
                                            </li>
                                        </ul>
                                    </div><!-- end navbar-cell -->
                                </div><!-- /.navbar-collapse -->        
                            </div><!-- end navbar cell -->
                        </div><!-- end navbar-table -->
                    </div><!-- end container fluid -->
                </nav><!-- end navbar -->
            </div><!-- end container -->
        </header>
        
        <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height: 450px; background-image:url('assets/images/savvy-gif.gif'); background-repeat: no-repeat; background-size: cover; width: 100% !important;">
                    <br><br><br><br><br><br><br><br><br><br><br><br><br>
                    <div class="row">
                        <div class="col-md-6 col-sx-12 col-lg-12">
                            <form action="{{ url("search/results") }}" method="GET" role="form">
                                <div class="input-group col-md-12">
                                    <div class="col-md-1s" style="margin-top: 40px;" id="zone">
                                        <form action="{{ url("search/results") }}" method="GET" role="form">
                                            <div class="input-group col-md-12">
                                                <div class="col-md-9 col-xs-7">
                                                    <input type="text" list="categories" name="q" required class="form-control to" placeholder="e.g House Cleaner or Electrical Maintenance" style="height: 37px !important;">
                                                    <datalist id="categories">
                                                        @foreach($the_cat as $cat)  
                                                        <option value="{{ $cat->name }}">
                                                        @endforeach 
                                                    </datalist>
                                                </div>
                                                <div class="input-group col-md-2 col-xs-5">
                                                    <select name="category" id="category" class="form-control to" style="height: 37px !important;" required>
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
                        
                    </div><!-- end row -->
                </div>
        </div>
        <div class="row" id="overall">
            <div class="col-lg-2 hidden-sm hidden-xs" style="border: 1px solid #01a185; border-right-color: white;border-bottom-color: white; height: 700px;" id="left-grid">
                <!-- <div class="col-md-12 general-title">
                    <h4 style="font-weight: lighter; color: grey !important; font-size: 20px;"> Featured Ads</h4>
                    <hr>
                </div><! end col -->

                <h3 style="font-weight: lighter; color: #01a185; text-align: center;">Featured Ads</h3>
                <ul style="list-style-type: none;">
                    @if($featuredAd->isEmpty())
                        
                        <li>
                            <p class="alert alert-info" style="font-size: 16px; color: grey; margin-left: -25px;"> Something awesome is coming</p>
                           
                        </li>
                   
                    @else
                    @foreach($featuredAd as $ad)
                    <a href="{{ url('http://'.$ad->url) }}" target="_blank">
                        <li style="border-radius: 7px; box-shadow: -1px 3px 7px 5px #e7e7e7; margin-left: -34px !important; height: 100px;">
                            <img src="<?php echo url(explode(',',$ad->img_url)['0']) ?>" title="ad image" alt="" class="alignleft img-responsive" style="height: 100px !important; width: 100px !important; border-radius: 7px; display: inline;">
                            <h5 style="padding: 10px;"><a href="#" style=" color: grey !important;">{{ substr($ad->title, 0, 12) }} ...</a></h5>
                           
                        </li>
                    </a>
                   @endforeach
                   @endif
                </ul>
                




                
            </div>
            <div class="col-lg-8" style="border: 1px solid #01a185; border-bottom-color: white;" id="central-grid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 general-title">
                        <h4 style="font-weight: lighter !important; color: grey !important; font-size: 20px; color: #01a185 !important;">Latest Buyer Request </h4>
                        <hr>
                    </div><!-- end col -->
                    <div class="container-fluid">
                    @if($adverts->isEmpty())
                        <p class="alert alert-waning">No Advert Available</p>
                    @else
                    
                        @foreach ($adverts->chunk(2) as $chunk)
                     @foreach ($chunk as $advert)
                     
                        <div class="col-md-2 col-xs-5 col-sm-5" style="box-shadow: -1px 3px 7px 5px #e7e7e7; border-radius: 7px; margin-bottom: 15px; height: 300px !important;" id="buyerBox">
                            <div class="item-box">
                                <div class="item-media entry">
                                    <div class="magnifier" style="color:white !important;">
                                        <div class="item-author">
                                             {{$advert->title }}
                                        </div><!-- end author -->
                                    </div>
                                    @if($advert->photos->last() == null)
                                    <img src="{{ url('download.png') }}" alt="" style="height:150px !important;" class="img-responsive">
                                    @else
                                    <img src="{{ url("assets/Product/".$advert->photos->first()->filename) }}" alt="" class="img-responsive" style="height:150px !important;">
                                    @endif
                                    
                                    <div class="theme__button" style="background-color: #01a185 !important; overflow: none;">
                                        <p>&#8358;{{ $advert->price }}</p>
                                    </div>
                                </div><!-- end item-media -->
                                <h4><a href="#">{{$advert->category_name }}</a></h4>
                                <div style="height: 4px !important; overflow: none;">{{$advert->lga }}, {{ $advert->state }}</div>
                                <br><br>
                                <a class="btn btn-info" href="http://savycon.com/single/advert/{{ $advert->id }}" style="background-color: #01a185 !important; margin-top: -1px;">View <i class="fa fa-eye" style="font-size: 15px;"></i> </a>
                            </div><!-- end item-box -->
                        </div><!-- end col -->
                        
                    
                     @endforeach
                    @endforeach
                    @endif
                    </div>
                    
                </div>
                <br><br><br>
                <div class="row">
                    <div class="col-lg-12 col-md-12 general-title">
                        <h4 style="font-weight: lighter !important; color: grey !important; font-size: 20px; color: rgb(243, 197, 0) !important;">Freelancers/Artisans</h4>
                        <hr>
                    </div><!-- end col -->

                    @if($freelancers->isEmpty())
                        <p class="alert alert-waning">No Freelancer Available</p>
                    @else
                    <div class="container-fluid">
                     @foreach ($freelancers->chunk(2) as $chunk)
                     @foreach ($chunk as $freelancer)
                     
                        <div class="col-md-2 col-xs-5 col-sm-5 col-lg-2 col-xl-2" style="box-shadow: -1px 3px 7px 5px #e7e7e7; border-radius: 7px; margin-bottom: 15px;  height: 300px !important;" id="freelancerBox">
                            <div class="item-box">
                                <div class="item-media entry">
                                    <div class="magnifier" style="color:white !important;">
                                        <div class="item-author">
                                             {{$freelancer->title}}
                                        </div><!-- end author -->
                                    </div>
                                    @if($freelancer->img_url == null)
                                    <img src="{{ url('download.png') }}" alt="" style="height:150px !important;" class="img-responsive">
                                    @else
                                    <img src="<?php echo $img = explode(',',$freelancer->img_url)['0'] ?>" alt="" class="img-responsive" style="height:150px !important; width: 200px !important;">
                                    @endif
                                    
                                    <div class="theme__button" style="background-color: #01a185 !important; overflow: none;font-size: 8px !important;">
                                        <p>{{$freelancer->price }}</p>
                                    </div>
                                </div><!-- end item-media -->
                                <h4><a href="#">{{$freelancer->category }}</a></h4>
                                <div style="height: 4px !important; overflow: none;">{{$freelancer->lga }}, {{ $freelancer->state }}</div>
                                <br><br>
                                <a class="btn btn-info" href="http://savycon.com/single/freelance/{{ $freelancer->id }}" style="background-color: #01a185 !important; margin-top: -1px;">View <i class="fa fa-eye" style="font-size: 15px;"></i> </a>
                            </div><!-- end item-box -->
                        </div><!-- end col -->
                        
                    
                     @endforeach
                    @endforeach
                    @endif
                    </div>
                </div>
              </div>
            <div class="col-lg-2" style="height: 100px; border: 1px solid #01a185; border-left-color: white;border-bottom-color: white;" id="right-grid">
                <!-- <div class="col-md-12 general-title">
                    <h4 style="font-weight: lighter; color: grey!important; font-size: 20px;"> </h4>
                    <hr>
                </div> end col -->
                <h3 style="font-weight: lighter; color: #01a185;">Recently Viewed</h3>
                <ul style="list-style-type: none;">
                    @if($recents->isEmpty())
                        <li>something Awesome is Coming</li>
                    @else
                    @foreach($recents as $ad)
                    <a href="http://savycon.com/single/freelance/{{ $ad->id }}" target="_blank">
                        <li style="border-radius: 7px; box-shadow: -1px 3px 7px 5px #e7e7e7; margin-left: -45px !important; height: 100px;">
                            @if($ad->img_url == null or empty($ad->img_url))
                            <img src="{{ url('download.png') }}" class="alignleft img-responsive" style="height: 100px !important; width: 100px !important; border-radius: 7px;">

                            @else
                            <img src="<?php echo url(explode(',',$ad->img_url)['0']) ?>" title="ad image" alt="" class="alignleft img-responsive" style="height: 100px !important; width: 100px !important; border-radius: 7px;">
                            @endif
                            <h5 style="padding: 10px;"><a href="http://savycon.com/single/freelance/{{ $ad->id }}" style=" color: grey !important;">{{ substr($ad->title, 0, 16) }} ...</a></h5>
                           
                        </li>
                    </a>
                   @endforeach
                   @endif
                </ul>
            </div>
        </div>

        <footer class="footer" style="border-bottom-color: white !important;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-lg-5">
                        <div class="media cen-xs">
                            <ul style="list-style-type: none;">
                                <li><a href="{{ url("privacy-policy") }}">Privacy & Policy</a></li>
                                <li><a href="{{ url("terms-of-use") }}">Terms of Use</h4></a></li>
                                <li><a href="{{ url("how-it-works") }}">How it Works</a></li>
                             </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-5">
                        <div class="media cen-xs">
                            <ul class="loscation" style="list-style-type: none;">
                                <li><a href="{{ url("frequently-ask-question") }}">FAQ</a></li>
                                <li><a href="{{ url("contact-us") }}">Suggestion</a></li>
                                <li><a href="{{ url("about") }}">About Us</a></li>
                                <div class="clearfix"></div>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <ul class="list-inline text-right cen-xs">
                            <li><a href="/">Home</a></li>
                          <!--   <li><a href="#">Site Terms</a></li> -->
                           <!--  <li><a href="#">Copyrights</a></li>
                            <li><a href="#">License</a></li>
                            <li><a href="#">Legal</a></li> -->
                            <li><a class="topbutton" href="#">Back to top <i class="fa fa-angle-up"></i></a></li>
                        </ul>
                    </div>
                </div><!-- end row -->
            </div><!-- end container -->
        </footer><!-- end footer -->
    </div><!-- end wrapper -->
    <!-- END SITE -->

    <script src="https://savycon.com/catalog-full/catalog-app/js/jquery.min.js"></script>
    <script>
        $('#hideBar').click(function () {
           $('#cbp-spmenu-s1').removeClass('cbp-spmenu-open');
        });
    </script>
    <script src="https://savycon.com/catalog-full/catalog-app/js/bootstrap.js"></script>
    <script src="https://savycon.com/catalog-full/catalog-app/js/custom.js"></script>

</body>
</html>