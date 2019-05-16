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
    <title>SavyCon-Get your Job/work done, A place to meet professional near you.</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <!-- FAVICONS -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
 

    <!-- TEMPLATE STYLES -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="http://localhost:8000/css/style.css">

    <!-- CUSTOM STYLES -->
    
<link rel="stylesheet" type="text/css" href="http://localhost:8000/css/savy.css">
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
<body>
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
                            <div class="navbar-cell" style="width:100px;">
                                <div class="navbar-header" >
                              <a href="{{ url("/") }}" style="color: #01a185; font-size: 30px; margin-left: -20px;">
                                <span style="color: rgb(243, 197, 0); margin-left: -15px;">Savy</span>
                                <span style="color: #01a185 !important; margin-left: -14px;" id="top-link">  con</span>
                              </a>

                                  
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
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:50vh;  background-color: #f8ef42;
background-image: linear-gradient(315deg, #f8ef42 0%, #0fd64f 74%); " > 
                    <div class="row">
                        <div class="col-md-6 col-sx-12 col-lg-12">
                            <form action="{{ url("search/results") }}" method="GET" role="form">
                                <div class="input-group col-md-12">
                                    <div class="col-md-1s" style="margin-top: 100px;" id="zone">
                                    <h4 class="text-center text-white">Engage Artisans all over the country </h4>
                                    <h1 class="text-center strong-900  text-white">SavyCon - Best place to get work done</h1>
                                        <form action="{{ url("search/results") }}" method="GET" role="form">
                                            <div class="input-group main-search col-md-12">
                                                <div class="col-md-7">
                                                
                                                    <input type="text" list="categories" name="q" required class="form-control to" placeholder="Example House Cleaner or Electrical Maintenance" style="height: 37px !important;">
                                                    <datalist id="categories">
                                                        @foreach($the_cat as $cat)  
                                                        <option value="{{ $cat->name }}">
                                                        @endforeach 
                                                    </datalist>
                                                    <i class="fa fa-search" ></i>
                                                     <label>search category</label>
                                                </div>
                                                <div class="input-group b-b col-md-3">
                                                    <select name="category" id="category"   style="height: 37px !important;" required>
                                                        <option value="">State</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <label>select state</label>
                                                    </div>
                                                    <div class="input-group col-md-2">
                                                   
                                                        <button type="submit"><i class="fa fa-search"></i></button>
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

 
 <br />
 <br />
 <br />
 <br />
 
           <div class="row" id="overall">
       

            <div class="col-md-12"  id="central-grid">
            <div class="container">
             <h4 class="header ml-3">Latest Buyer Request </h4>
                       <h4 class="header-more ml-3">See More</h4>
                <div class="row mt-5">
                     
                    
                    
                    @if($adverts->isEmpty())
                        <p class="alert alert-waning">No Advert Available</p>
                    @else
                    
                        @foreach ($adverts->chunk(2) as $chunk)
                     @foreach ($chunk as $advert)
                     
                        <div class="col-md-4">
                            <div class="product"> 
  <img class="product__image" src="{{ url("assets/Product/".$advert->photos->first()->filename) }}">
  <br />
  <h1 class="product__title">{{$advert->title }} <br> <small>{{$advert->category_name }}</small></h1>
  <hr />
  <p>{{$advert->description }}</p>
  <a href="/single/advert/{{ $advert->id }}" class="product__btn btn">{{ $advert->price }}</a>
</div>
                        </div>
                      
                            
                       
                    
                     @endforeach
                    @endforeach
                    @endif
                    </div>
                    
                </div>
                </div>
                    
                </div>
                <br><br><br>
                <div class="row">
                    
                    @if($freelancers->isEmpty())
                        <p class="alert alert-waning">No Freelancer Available</p>
                    @else
                    <div class="container">
                     <h4 class="header ml-3">Freelancers/Artisans</h4>
                     <h4 class="header-more">See More</h4>
                       <div class="row mt-5">
                     @foreach ($freelancers->chunk(2) as $chunk)
                     @foreach ($chunk as $freelancer)
                       <div class="col-md-4">
                            <div class="product"> 
  <img class="product__image" src="{{ url('download.png') }}">
  <br />
  <h1 class="product__title">{{$freelancer->title}} <br> <small>{{$freelancer->category }}</small></h1>
  <hr />
  <p>{{$freelancer->lga }}, {{ $freelancer->state }}</p>
  <a href="/single/freelance/{{ $freelancer->id }}" class="product__btn btn">{{$freelancer->price }}</a>
</div>
                        </div>
                        
                    
                     @endforeach
                    @endforeach
                    @endif
                    
                </div>
              </div>
             </div>
        </div>     

        <footer class="footer" style="border-bottom-color: white !important;">
            <div class="container">
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