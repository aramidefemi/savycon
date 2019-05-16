<style>
    ul li{
        display: block;
        text-decoration: none;
    }

    ul li a{
        color: #fff;
        text-decoration: none;
    }
</style>
<!--footer section start-->
<footer style="margin-top:40px;">
    <div class="footer-bottom text-center">
        <div class="container">
                <!--<div class="col-xs-6 col-md-4 footer-grid text-left">-->
                <!--    <ul style="smargin-top:10px;">-->
                <!--        <li><a href="{{ url("#") }}" data-toggle="modal" data-target="#subscribe"><h4>Suggestion</h4></a></li>-->
                        <!--<li style="margin-left: -21px;"> <a href="#" data-toggle="modal" data-target="#donate"><img src="{{ url("assets/images/donate.png") }}" style="width:147px;" alt=""></a></li>-->
                <!--    </ul>-->
                <!--</div>-->
                <div class="col-md-4 col-xs-5 footer-grids text-left">
                    
                    <ul>
                        <li><a href="{{ url("privacy-policy") }}">Privacy & Policy</a></li>
                        <li><a href="{{ url("terms-of-use") }}">Terms of Use</h4></a></li>
                        <li><a href="{{ url("how-it-works") }}">How it Works</a></li>
                       
                    </ul>
                </div>
                <div class="col-md-4 col-md-offset-2 col-xs-7 footer-grids text-left">
                    
                    
                        <ul class="loscation">
                            <li><a href="{{ url("frequently-ask-question") }}">FAQ</a></li>
                            <li><a href="{{ url("contact-us") }}">Suggestion</a></li>
                            <li><a href="{{ url("about") }}">About Us</a></li>
                            <div class="clearfix"></div>
                        </ul>

                   
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="copyrights" style="margin-top: 20px; margin-bottom: 10px">
                <p> &copy; {{ date('Y') }} SavyCon. All Rights Reserved </p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</footer>
<!--footer section end-->

