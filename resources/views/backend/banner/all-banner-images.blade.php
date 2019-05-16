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
            @if($banners->isEmpty())
                <p class="alert alert-warning">
                    No Image Found
                </p>
            @else
                <table class="table table-responsive table-hover">
                    <tr>
                        <th>#</th>
                        <th>slug</th>
                        <th>Image</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                    @foreach($banners as $item)
                        <tr>
                            <td>{{ $count+=1 }}</td>
                            <td><img src="{{ $item->image }}"  style="height: 100px width:100px"/> </td>
                            <td>{{ $item->slug }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <a href="{{ url("admin/delete/banner/$item->slug") }}" class="btn btn-xs btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </table>

            @endif
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@endsection

