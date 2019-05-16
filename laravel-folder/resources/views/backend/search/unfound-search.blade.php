@extends('backend.layouts.master')

@section('page-header')
    <h1>
        Search Keyword
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
            @if($items->isEmpty())
                <p class="alert alert-warning">No Content Found</p>
            @else
                <table class="table table-responsive table-hover">
                    <tr>
                        <th>#</th>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Search Keyword</th>
                        <th>Created Date</th>
                    </tr>
                    @foreach($items as $item)
                        <tr>
                            <td>{{ $count+=1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->keyword }}</td>
                            <td>{{ $item->created_at }}</td>
                        </tr>
                    @endforeach
                </table>
                @endif
                        <!-- /.box-body -->
        </div><!--box box-success-->
    </div>
@endsection