@extends('backend.layouts.master')

@section('page-header')
    <h1>
        Edit Category {{ $edit->name }}
    </h1>
@endsection


@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Edit New Category</h3>
          <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <div class="box-body">
            <form action="{{ url("admin/edit/category/$edit->slug") }}" method="post" role="form">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="cat name"> Category Name:</label>
                    <input type="text" name="name" value="{{ $edit->name }}" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Edit Category" class="btn btn-info">
                </div>
            </form>
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@endsection