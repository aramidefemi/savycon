<style>
    @media(max-width: 420px){
        .mobile{
            position: relative;
            top: -16px;
            right: -40px;
        }
    }
</style>
<div class="header">
    <div class="container">
        <div class="logo">
            <a href="{{ url("/") }}"><span><img src="{{ url("assets/images/logo.png") }}" style="width:60px"/></span><span style="margin-left: -15px;">avy</span>con</a>
        </div>
        <div class="header-right">
            <div class="col-xs-12">
                @if(auth()->user())
                    <a class="account" href="{{ url("new-advert") }}" style="border-right: 1px solid #fff;">Create Ad</a>
                    <a class="account" href="{{ url("dashboard") }}">My Account</a>
                    <span class="dropdown nav-drop">
                    <button class="btn mobile" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                       <span class="">
                            <i class="fa fa-user"></i> {{ auth()->user()->email }}
                           <span class="caret"></span>
                       </span>

                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="{{url("auth/password/change") }}">Account Settings</a></li>
                        <li><a href="{{ url("user/advert") }}">My Advert</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ url("auth/logout") }}">Sign Out</a></li>
                    </ul>
                </span>
                    @else
                    <a class="account hidden-xs" href="{{ url("auth/login") }}">Login</a>
                    <a class="account visible-xs" style="margin-right: 10px " href="{{ url("auth/login") }}">Login</a>
                    <a class="account" href="{{ url("get-started/register/") }}">Register</a>
                @endif
            </div>

        </div>
    </div>
</div>
