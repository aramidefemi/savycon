@extends('backend.layouts.master')

@section('page-header')
    <h1>
        All deleted Ads
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
            @if($deletes->isempty())
                <p class="alert alert-warning">No record Found</p>
            @else
                <table class="table table-hover">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                    @foreach($deletes as $delete)
                        <tr>
                            <td>{{ $count+=1 }}</td>
                            <td>{{ $delete->title }}</td>
                            <td>{{ $delete->price }}</td>
                            <td>{{ $delete->created_at }}</td>
                            <td><a href="#" class="btn btn-success">Restore</a></td>
                        </tr>
                    @endforeach
                </table>
                @endif
                        <!-- /.box-body -->
        </div><!--box box-success-->
    </div>
@endsection