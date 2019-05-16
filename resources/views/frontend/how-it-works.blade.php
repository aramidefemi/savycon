@extends('frontend.layouts.master')

@section('content')
        <!-- How it works -->
<div class="work-section">
    <div class="container">
        <h2 class="head">How It Works</h2>
        
            <div class="terms main-grid-border">
        <p>Savycon.com is an avenue for you to get what you need without going extra miles looking for the Right  person.
Through our database of reliable users, you can seek users who can help you in achieving certain task, no matter how tedious.
Just post what you need and get response in a very short time.</p></br>
<p>For example, If you need a mobile phone, or a services to be done, post the model and the environment you reside. In no time, our users will get to you with the best.</br>
For those experts who need work, just keep eyes on what clients post and bid with perfect pitch.</p>
                </div>
        <div class="work-section-head text-center">
            <p>Fast, easy and free to post an ad and you will find, what you are looking for.</p>
        </div>
        
        <div class="work-section-grids text-center">
            <div class="col-md-3 work-section-grid">
                <i class="fa fa-pencil-square-o"></i>
                
                <h4>Post an Ad</h4>
                <p>Both Freelancer(seller) and buyer can post services needed or that can be offer</p>
                <span class="arrow1"><img src="{{ url("assets/images/arrow1.png") }}" alt="" /></span>
            </div>
            <div class="col-md-3 work-section-grid">
                <i class="fa fa-eye"></i>
                <h4>Find an item</h4>
                <p>Buyer can use the search box to search for the services he wants E.g: Dry Cleaner</p>
                <span class="arrow2"><img src="{{ url("assets/images/arrow2.png") }}" alt="" /></span>
            </div>
            <div class="col-md-3 work-section-grid">
                <i class="fa fa-phone"></i>
                <h4>Contact</h4>
                <p>Both the Freelancer(seller)/skilled professional and the buyer(someone who needs a service to be done) have the opportunity to contact each each other </p>
                <span class="arrow1"><img src="{{ url("assets/images/arrow1.png") }}" alt="" /></span>
            </div>
            <div class="col-md-3 work-section-grid">
                <i class="fa fa-money"></i>
                <h4>Get it done and Transact</h4>
                <p>Get the service done at a concluded location of both parties and get paid</p>
            </div>
            <div class="clearfix"></div>
            <a class="work" href="{{ url("/")}}">Get start Now</a>
        </div>
    </div>
</div>
<!-- // How it works -->
@endsection
