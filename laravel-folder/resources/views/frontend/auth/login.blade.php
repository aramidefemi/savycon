
@extends('frontend.layouts.master')

@section('content')
    <div id="page-wrapper" class="sign-in-wrapper">
        <div class="graphs">
            <div class="sign-in-form">
                <div class="sign-in-form-top">
                    <h1 class="text-center">Log in</h1>
                </div>
                <div class="signin">
                    <div class="panel-body">

                        {!! Form::open(['url' => 'auth/login', 'class' => 'form-horizontal', 'role' => 'form']) !!}

                        <div class="form-group">
                            {{--                            {!! Form::label('email', trans('validation.attributes.email'), ['class' => 'col-md-4 control-label']) !!}--}}
                            <div class="col-md-">
                                {!! Form::input('email', 'email', old('email'), ['class' => 'form-control', 'placeholder'=>'Enter your Email']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {{--                            {!! Form::label('password', trans('validation.attributes.password'), ['class' => 'col-md-4 control-label']) !!}--}}
                            <div class="col-md-">
                                {!! Form::input('password', 'password', null, ['class' => 'form-control', 'placeholder'=>'Enter your Password']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md- col-md-offset-">
                                <div class="checkbox">
                                    <label>
                                        {!! Form::checkbox('remember') !!} {{ trans('labels.remember_me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md- col-md-offset-">
                                {!! Form::submit(trans('labels.login_button'), ['class' => 'btn btn-primary btn-block', 'style' => 'margin-right:15px']) !!}
                            </div>
                        </div>
                        <div class="signin-rit card" style="margin-bottom: 10px; height: 44px;  background: rgba(212, 211, 211, 0.08);">
                        <span class="checkbox1">
                             <label class="text-muted"><a href="{{ url("password/email") }}">Forgot Password ?</a></label>
                        </span>
                           
                            <div class="clearfix"> </div>
                        </div>
                        {!! Form::close() !!}

                        <div class="row text-center">
                            {!! $socialite_links !!}
                        </div>
                    </div><!-- panel body -->
                </div>
                <div class="new_people card" style="margin-top: 10px; padding-bottom: 25px">
                    <h2>New Here?</h2>
                    <p>Getting Started is Easy.</p>
                    <a href="{{ url("get-started/register/") }}">Register Now!</a>
                </div>
            </div>
        </div>
    </div>
@endsection