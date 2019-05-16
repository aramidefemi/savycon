@extends('backend.layouts.master')

@section('page-header')
    <h1>
        Edit State
    </h1>
@endsection


@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Edit State</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <div class="box-body">
            <form action="{{ url("admin/edit/state/$state->id") }}" method="post" role="form">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="state name"> State Name:</label>
                    <input type="text" name="name" value="{{ $state->name }}" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Update  State" class="btn btn-info">
                </div>
            </form>
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@endsection