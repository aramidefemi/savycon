@extends('frontend.layouts.master')

@section('content')
    <div class="contact main-grid-border">
        <div class="container">
            <h2 class="head text-center">Suggestion</h2>
            <section id="hire">
                <form id="filldetails" action="{{ url("contact-us") }}" method="POST">
                    
                    {{ csrf_field() }}
                    <div class="field name-box">
                        <input type="text" id="name" name="name" placeholder="Who Are You?"/>
                        <label for="name">Name</label>
                        <span class="ss-icon">check</span>
                    </div>

                    <div class="field email-box">
                        <input type="text" id="email" name="email" placeholder="example@email.com"/>
                        <label for="email">Email</label>
                        <span class="ss-icon">check</span>
                    </div>


                    <div class="field msg-box">
                        <textarea id="msg" rows="4" name="comment" placeholder="Your message goes here..."/></textarea>
                        <label for="msg">Your Msg</label>
                        <span class="ss-icon">check</span>
                    </div>

                    <div class="clear"></div> 
                    <input class="button" type="submit" value="Send" />
                
                </form>
               <div class="col-md-3 footer-grid">
							<h4 class="footer-head">Contact Us</h4>
							<!--<span class="hq">Our headquarters</span>-->
							<!--<address>-->
							<!--	<ul class="location">-->
							<!--		<li><span class="glyphicon glyphicon-map-marker"></span></li>-->
							<!--		<li>CENTER FOR FINANCIAL ASSISTANCE TO DEPOSED NIGERIAN ROYALTY</li>-->
							<!--		<div class="clearfix"></div>-->
							<!--	</ul>	-->
								<ul class="location">
									<li><span class="glyphicon glyphicon-earphone"></span></li>
									<li>+234 813 501 0778</li>
									<div class="clearfix"></div>
								</ul>	
								<ul class="location">
									<li><span class="glyphicon glyphicon-envelope"></span></li>
									<li><a href="mailto:support@savycon.com">support@savycon.com</a></li>
									<div class="clearfix"></div>
								</ul>						
							</address>
						</div>
                    
                </div>
            </section>
            
            <script>
                $('textarea').blur(function () {
                    $('#hire textarea').each(function () {
                        $this = $(this);
                        if (this.value != '') {
                            $this.addClass('focused');
                            $('textarea + label + span').css({ 'opacity': 1 });
                        } else {
                            $this.removeClass('focused');
                            $('textarea + label + span').css({ 'opacity': 0 });
                        }
                    });
                });
                $('#hire .field:first-child input').blur(function () {
                    $('#hire .field:first-child input').each(function () {
                        $this = $(this);
                        if (this.value != '') {
                            $this.addClass('focused');
                            $('.field:first-child input + label + span').css({ 'opacity': 1 });
                        } else {
                            $this.removeClass('focused');
                            $('.field:first-child input + label + span').css({ 'opacity': 0 });
                        }
                    });
                });
                $('#hire .field:nth-child(2) input').blur(function () {
                    $('#hire .field:nth-child(2) input').each(function () {
                        $this = $(this);
                        if (this.value != '') {
                            $this.addClass('focused');
                            $('.field:nth-child(2) input + label + span').css({ 'opacity': 1 });
                        } else {
                            $this.removeClass('focused');
                            $('.field:nth-child(2) input + label + span').css({ 'opacity': 0 });
                        }
                    });
                });
                $('#hire .field:nth-child(3) input').blur(function () {
                    $('#hire .field:nth-child(3) input').each(function () {
                        $this = $(this);
                        if (this.value != '') {
                            $this.addClass('focused');
                            $('.field:nth-child(3) input + label + span').css({ 'opacity': 1 });
                        } else {
                            $this.removeClass('focused');
                            $('.field:nth-child(3) input + label + span').css({ 'opacity': 0 });
                        }
                    });
                });
                $('#hire .field:nth-child(4) input').blur(function () {
                    $('#hire .field:nth-child(4) input').each(function () {
                        $this = $(this);
                        if (this.value != '') {
                            $this.addClass('focused');
                            $('.field:nth-child(4) input + label + span').css({ 'opacity': 1 });
                        } else {
                            $this.removeClass('focused');
                            $('.field:nth-child(4) input + label + span').css({ 'opacity': 0 });
                        }
                    });
                });
                //@ sourceURL=pen.js
            </script>
            <script>
                if (document.location.search.match(/type=embed/gi)) {
                    window.parent.postMessage("resize", "*");
                }
            </script>
        </div>
    </div>

@endsection
