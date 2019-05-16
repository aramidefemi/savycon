@extends('backend.layouts.master')

@section('page-header')
    <h1>
        New Advert
    </h1>
@endsection


@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Featured  Advert</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div><!-- /.box-header -->
        <div class="box-body">
            @if($featuredAds->isEmpty())
                <p class="alert alert-warning">
                    No Advert Found
                </p>
            @else
                <table class="table table-responsive table-hover">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Url</th>
                        <th>State</th>
                        <th>Showing</th>
                        <th>Show</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                    @foreach($featuredAds as $item)
                        <tr>
                            <td>{{ $count+=1 }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->url }}</td>
                            <td>{{ $item->state }}</td>
                            <td>{{ $item->to_show }}</td>
                            <td><input type="checkbox" name="show" id="show"></td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <a href="{{ url("admin/edit/featured-ad/$item->id") }}" class="btn btn-xs btn-info">Edit</a>
                                <a href="{{ url("admin/delete/featured-ad/$item->id") }}" class="btn btn-xs btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </table>

            @endif
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@endsection

