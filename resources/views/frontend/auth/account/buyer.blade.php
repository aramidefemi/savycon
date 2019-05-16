@extends('frontend.layouts.master')

@section('content')
    <section class="">
        <div id="page-wrapper" class="sign-in-wrapper">
            <div class="graphs">
                <div class="sign-up card" style="border: 1px solid transparent; border-radius: 5px;">
                    <h1 style="padding: 10px; margin-top: 10px;">Register As Buyer</h1>

                    <div class="panel-body ">

                        <form action="{{ url("auth/register/buyer") }}" class="form-horizontal" method="post">


                            <input type="hidden" name="user_type" value="buyer">
                            <div class="form-group">
                                {!! Form::label('name', trans('validation.attributes.name'), ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-8">
                                    {!! Form::input('name', 'name', old('name'), ['class' => 'form-control', 'placeholder'=>'Enter your Name']) !!}
                                </div>
                            </div>
                            {{ csrf_field() }}
                            <div class="form-group">
                                {!! Form::label('phone', 'Phone Number', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-8">
                                    {!! Form::input('text', 'phone', old('phone'), ['class' => 'form-control', 'placeholder'=>'Enter your Phone Number(separate multiple with [,]']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('category', 'Category', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-8">
                                    <select name="category" id="category" class="form-control">
                                        <option value="">Select your Category</option>
                                        @foreach($categories as $category)
                                            <option  value="{!! $category->name !!}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address" class="col-md-4 control-label">Address</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('state', 'State', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-8">
                                    <select name="state" id="state" class="form-control">
                                        <option value="Oyo State">Select your State</option>
                                        @foreach($states as $state)
                                            <option  value="{!! $state->name !!}">{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('lga', 'Area', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-8">
                                    <select name="lga" id="lga" class="form-control">
                                        <option value="">Select Local Gvt.</option>

                                    </select>
                                </div>

                            </div>
                            <div class="form-group">
                                {!! Form::label('email', trans('validation.attributes.email'), ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-8">
                                    {!! Form::input('email', 'email', old('email'), ['class' => 'form-control', 'placeholder'=>'Enter your Email Address']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('password', trans('validation.attributes.password'), ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-8">
                                    {!! Form::input('password', 'password', null, ['class' => 'form-control', 'placeholder'=>'Enter your Password']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('password_confirmation', trans('validation.attributes.password_confirmation'), ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-8">
                                    {!! Form::input('password', 'password_confirmation', null, ['class' => 'form-control', 'placeholder'=>'Confirm your Password']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    {!! Form::submit(trans('labels.register_button'), ['class' => 'btn btn-primary']) !!}
                                </div>
                            </div>

                        {!! Form::close() !!}

                    </div><!-- panel body -->
                </div>
            </div>
        </div>
    </section>

@endsection

@section('ajax')
    @include('frontend.includes.ajax')
@endsection