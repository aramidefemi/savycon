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

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('strings.backend.WELCOME') }} {!! auth()->user()->name !!}!</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="col-md-1 col-md-offset-11">
                <a href="{{ url("admin/view/suggestion") }}" class="btn btn-info btn-xs">Back</a>
            </div>
            <h3>Suggest from: {{  $suggestion->email }}</h3>
            <div class="well">
                <strong>
                    <p>Name: {{ $suggestion->name }}</p>
                    <p>Comment: {{ $suggestion->comment }}</p>
                </strong>
            </div>
            <!-- /.box-body -->
        </div><!--box box-success-->
    </div>
@endsection