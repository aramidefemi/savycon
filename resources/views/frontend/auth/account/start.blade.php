@extends('frontend.layouts.master')
<style>
    .card{
        border: 1px solid transparent;
        box-shadow: 0px 0px 4px rgba(110,110,110, .24);
        padding: 10px;
        padding-top: 20px;
        background: #fff;
    }
    .reg{
        background-color: #efefef;
        padding: 10px 20px;
    }
</style>
@section('content')
    <div class="col-xs-12" style="margin-top: 10px">
        <div class="panel panel-default">
            <div class="panel-body">
                <div role="tabpanel">
                    <div class="tab-content col-md-8 col-md-offset-2">

                        <div role="tabpanel" class="tab-pane mt-30 mb-30 active" id="freelance">
                            <div style="margin-top: 20px">
                                <h3 class="text-bold text-center text-muted">Get Started Register An Account</h3>
                                <hr>
                            </div>
                            <div class="col-md-6">
                                <div class="cards">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-12">
                                            <div class="thumbnail">
                                                <img src="{{ url("assets/images/b1.jpg") }}" class="img-rounded img-responsive" alt="...">
                                                <div class="caption text-center ">
                                                    <h3 class="text-center text-muted">Freelancer</h3>
                                                    <p>Are you a skilled Professional or you can offer a service? </p>
                                                    <p>
                                                        <a href="{{ url("auth/register/freelance") }}" class="btn btn-info btn-block" role="button">Get Started</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cards">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-12">
                                            <div class="thumbnail">
                                                <img src="{{ url("assets/images/b2.jpg") }}"  class="img-rounded img-responsive" alt="...">

                                                <div class="caption text-center ">
                                                    <h3 class="text-muted">Buyer</h3>

                                                    <p>Do you have a work/job to be done or you want to hire an expert?</p>
                                                    <p>
                                                        <a href="{{ url("auth/register/buyer") }}" class="btn btn-info btn-block" role="button">Get Started</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--tab panel profile-->
                    </div><!--tab content-->

                </div><!--tab panel-->

            </div><!--panel body-->

        </div><!-- panel -->

    </div><!-- comastl-xs-12 -->
    <div class="clear-fix"></div>
@endsection
