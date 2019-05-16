<!doctype html>
<html class="no-js" lang="">
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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{ csrf_token() }}" />
        <title>@yield('title', 'SavyCon')</title>
        <meta name="description" content="@yield('meta_description', 'Default Description')">
        <meta name="author" content="@yield('author', 'Anthony Rappa')">
        @yield('meta')
        @yield('style')
        @yield('before-styles-end')
       
         <link rel="stylesheet" href="{{ url("css/backend/plugin/dropzone.css") }}">
         <link rel="stylesheet" href="{{ url("css/backend.css") }}">
        @yield('after-styles-end')

        <!-- HTML5 Shim and Refspond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>

        <![endif]-->
        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    </head>
    <body class="skin-blue">
        
        <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TTQVJ4V"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
        
        <div class="wrapper">
          <!-- Main Header -->
          <header class="main-header">

            <!-- Logo -->
            <a href="{!!route('home')!!}" class="logo" style="background: #f8f8f8;font-size: 43px !important;"><img src="{{ url("assets/images/logo.png") }}" style="width:60px"/><span style="color: rgb(243, 197, 0); margin-left: -15px;">avy</span>
                                <span style="color: #01a185 !important; margin-left: -14px;" id="top-link">con</span> </a>
            <!-- <a href="{{ url("/") }}" style="color: #01a185; font-size: 45px; margin-left: -30px;"><span><img src="{{ url("assets/images/logo.png") }}" style="width:60px"/></span><span style="color: rgb(243, 197, 0); margin-left: -15px;">avy</span>
                                <span style="color: #01a185 !important; margin-left: -14px;" id="top-link">con</span></a> -->
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation" style="background: #01a185 !important;">
              <!-- Sidebar toggle button-->
              <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">{{ trans('labels.toggle_navigation') }}toggle<i class="fa fa-bars"></i></span>
              </a>
              <!-- Navbar Right Menu -->
              <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ auth()->user()->email }} <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="/auth/logout">Sign Out</a></li>
                      <li><a href="/auth/password/change">Account Settings</a></li>
                      <li><a href=""></a></li>
                    </ul>
                  </li>

                  <!-- Messages: style can be found in dropdown.less-->
                  @if(auth()->user()->user_type == 'buyer' OR auth()->user()->user_type == 'freelance')
                  <li class="dropdown messages-menu">
                    <!-- Menu toggle button -->
                    <a href="/view/messages" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-envelope-o"></i>

                      <span class="label label-success">{{ $number }}</span>
                    </a>
                  
                  </li><!-- /.messages-menu -->
                  @endif
                



                </ul>
              </div>
            </nav>
          </header>
          <!-- Left side column. contains the logo and sidebar -->
          <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
              <!-- Sidebar user panel (optional) -->
              <div class="user-panel">
                <div class="pull-left image">
                  <img src="{!! access()->user()->picture !!}" class="img-circle" alt="User Image" />
                </div>
                
              </div>

           

              <!-- Sidebar Menu -->
              <ul class="sidebar-menu">
                <li class="header" style="color: white !important;">Dashboard</li>

                <!-- Optionally, you can add icons to the links -->
                <li class="active"><a href="/dashboard"><span>My Account</span></a></li>
                <li class=""><a href="/new-advert"><span>Create Ad</span></a></li>
                <li><a href="/user/advert"><span>My Advert</span></a></li>
                <li><a  href="/all-ad/{{ auth()->user()->id }}"><span>View My Ads</span></a></li>

               
            </section>
            <!-- /.sidebar -->
          </aside>


          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              @yield('page-header')
              <ol class="breadcrumb">
                @yield('breadcrumbs')
              </ol>
            </section>

            <!-- Main content -->
            <section class="content">
              @include('includes.partials.messages')
              <div class="container-fluid">
        <div class="col-md-12 col-lg-12">
            <div class="panel panel-default card">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4 col-md-push-8" style="padding-top: 12px;">
                            <ul class="media-list card">
                                
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
                                                <strong>Member Type:</strong> <span  style="text-transform: capitalize">{{ auth()->user()->user_type ? auth()->user()->user_type : 'Nil' }}</span>
                                            </small>
                                            <br><i class="fa fa-eye"> {{ $viewed }}</i>

                                        </h4>
                                        
                                        @permission('view-backend')
                                        <a href="{{ route("backend.dashboard") }}" class="btn btn-danger btn-xs">Administration Section</a>
                                        @endauth
                                    </div><!--media-body-->
                                </li><!--media-->
                            </ul><!--media-list-->

                            <div class="panel panel-default ">
                                <div class="panel-heading">
                                    <br>
                                    <h4>Featured Ads</h4>
                                    <hr>
                                </div><!--panel-heading-->

                                <div class="panel-body ard">
                                    @if($featuredAd->isEmpty())
                                        <p class="alert alert-warning">something Awesome is Coming</p>
                                    @else
                                        @foreach($featuredAd as $ad)
                                            <div class="card" style="margin-bottom:9px;">
                                                <a href="{{ url("#") }}" class="">
                                                    <div class="featured-ad-left" style="margin-right:3%;">
                                                        <img src="<?php echo explode(',',$ad->img_url)['0'] ?>" title="ad image" alt="" style="height: 60px; width: 60px;" />
                                                    </div>
                                                    <div class="featured-ad-right">
                                                        <h4 class="text-muted">{{ $ad->title }}</h4>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </a>
                                                <p  style="padding: 0px; margin: 0px;;"><a href="{{ url("#") }}" class="btn btn-info btn-xs btn-block" style="background: #01a185;">Read More</a></p>

                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <!--panel-body-->
                            </div><!--panel-->
                        </div><!--col-md-4-->

                        <div class="col-md-8 col-md-pull-4">
                            <div class="row">
                                @if(auth()->user()->user_type == 'freelance')
                                    <h4 class="text-muted" style="color:#fff; font-weight:500; padding: 10px; margin-top: 10px; background: #080808">Latest Buyer Request</h4>
                                @elseif(auth()->user()->user_type == 'buyer')
                                    <h4 class="text-muted" style="color:#fff; font-weight:500; padding: 10px; margin-top: 10px; background: #01a185;">Recent Freelancer</h4>
                                @endif
                                <hr>
                                @if(count($details) < 1)
                                    <p class="alert alert-warning" style="background: #f694a6 !important; border-color: #f694a6;">
                                        No Offer Available for Your Category
                                    </p>
                                @else
                                    <div class="cards">
                                        <div class="row">
                                            @foreach($details as $detail)
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="thumbnail">
                                        @if(auth()->user()->user_type == 'freelance')
                                                            <img src="{{ url("assets/Product/".$detail->photos->first()->filename) }}" class="img-rounded img-responsive" alt="{{ url("assets/Product/".$detail->photos->first()->filename) }}" style="height: 178px;;">
                                        @elseif(auth()->user()->user_type == 'buyer')
                                        <img src="{{ url("assets/Product/".$detail->photos->first()->filename) }}" class="img-rounded img-responsive" alt="{{ url("assets/Product/".$detail->photos->first()->filename) }}" style="height: 178px;;">
                                                        @endif
                                                        <div class="caption">
                                                            <h4 class="text-center text-danger text-muted">{{ $detail->title }}</h4>
                                                            <div class="text-info text-left bg-info" style="padding: 7px; font-weight: 600; border-radius: 5px; margin-top: 10px;">Category: {{ $detail->category_name }}
                                                                <br>
                                                                State: {{ $detail->state }}<br>
                                                                Price: {{ $detail->price }}
                                                                <br>Type: {{ $detail->price_type }}
                                                                <br>Created: {{ $detail->created_at->format('d:m:Y|h:i') }}
                                                            </div>
                                                        </div>

                                                        <p>
                                                            <a href="{{ url("") }}" class="btn btn-xs btn-danger btn-block" role="button">Get Details</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div><!--row-->

                        </div><!--col-md-8-->

                    </div><!--row-->

                </div><!--panel body-->

            </div><!-- panel -->

        </div>
    </div>
            </section><!-- /.content -->
          </div><!-- /.content-wrapper -->

          @include('backend.includes.footer')
        </div><!-- ./wrapper -->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        {{--<script type="text/javascript" src="{{ url("assets/js/jquery.min.js") }}"></script>--}}

        <script>window.jQuery || document.write('<script src="{{asset('js/vendor/jquery-1.11.2.min.js')}}"><\/script>')</script>
        
        
        <script src="{{ url("js/vendor/bootstrap.min.js") }}"></script>
        @yield('before-scripts-end')
        <script src="{{ url("js/vendor/dropzone.js") }}"></script>
        <script src="{{ url("js/backend.js") }}"></script>
       
        @yield('after-scripts-end')
        @yield('script-date')
    </body>
</html>


