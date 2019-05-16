@extends('backend.layouts.master')

@section('page-header')
    <h1>
        Suggestion
        <small>{{ trans('strings.backend.dashboard_title') }}</small>
    </h1>
@endsection

@section('breadcrumbs')
    <li><a href="{!!route('backend.dashboard')!!}"><i class="fa fa-dashboard"></i> {{ trans('menus.dashboard') }}</a></li>
    <li class="active">{{ trans('strings.here') }}</li>
@endsection

@section('style')
    <link href="{{ url("assets/admin/css/bootstrap-datepicker.css") }}" rel="stylesheet">
@endsection
@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('strings.backend.WELCOME') }} {!! auth()->user()->name !!}!</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div><!-- /.box-header -->
        <div class="box-body">
            <form action="{{ url("admin/delete/ad") }}" method="post" role="form">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="start-date">Start Date</label>
                    <input data-provider="datepicker" name="start_date" placeholder="Start Date" id="start" class="form-control datepicker">
                </div>
                <div class="form-group">
                    <label for="start-date">End Date</label>
                    <input data-provider="datepicker" name="end_date" placeholder="End Date" id="end" class="form-control datepicker">
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Delete Ad" class="btn btn-primary                                                                                                                                                                                                                                                                                                                                                       ">
                </div>
            </form>
             <!-- /.box-body -->
        </div><!--box box-success-->
    </div>
    @section('script-date')
        <script src="{{ url("assets/admin/js/bootstrap-datepicker.js") }}"></script>
        <script>
            $('.datepicker').datepicker({
                format:'yyyy-mm-dd'
            });
        </script>
        @stop
@endsection