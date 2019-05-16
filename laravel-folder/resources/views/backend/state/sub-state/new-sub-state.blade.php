@extends('backend.layouts.master')

@section('page-header')
    <h1>
        New Sub State
    </h1>
@endsection


@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Create New Sub State</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div><!-- /.box-header -->
        <div class="box-body">
            <form action="{{ url('admin/new/sub/state') }}" method="post" role="form">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="sub-state-name">Choose State</label>
                    <select name="state" id="state" class="form-control">
                        <option value="">Select State</option>
                        @foreach($states as $state)
                            <option value="{{ $state->name }}">{{ $state->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="sub-state-name"> Area Name:</label>
                    <input type="text" name="sub_state_name" placeholder="Enter Area Name" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="New Sub State" class="btn btn-info">
                </div>
            </form>
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@endsection