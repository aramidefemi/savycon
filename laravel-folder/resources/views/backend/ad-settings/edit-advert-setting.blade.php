@extends('backend.layouts.master')

@section('page-header')
    <h1>
        Edit Advert
    </h1>
@endsection


@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Create New Advert</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div><!-- /.box-header -->
        <div class="box-body">
            <form action="{{ url('admin/new/featured/ad') }}" method="post" role="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="cat name"> Title:</label>
                    <input type="text" name="title" value="{{ $edit->title }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="cat name"> Url:</label>
                    <input type="text" name="url" value="{{ $edit->url }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="cat name"> Where ro Show:</label>
                    <select name="show" id="show" class="form-control">
                        <option value="{{ $edit->title }}">value="{{ $edit->state }}"</option>
                        <option value="home">Home Page</option>
                        <option value="dashboard">Dashboard</option>
                        <option value="all">All Page</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="state"> Select State</label>
                    <br>
                    <div class="well">
                        <input type="checkbox" value="nil" name="state[]"> All
                        @foreach($states as $state)
                            <input type="checkbox" class="forsm-control" name="state[]" value="{{ $state->name }}"> {{ $state->name }}
                            {{--                            <option value="{{ $state->name }}">{{ $state->name }}</option>--}}
                        @endforeach
                    </div>

                </div>
                <div class="form-group">
                    <label for="cat name"> Image:</label>
                    <input type="file" name="photos[]"  class="form-control" multiple>
                </div>
                <div class="form-group">
                    <label for="cat name"> Description:</label>
                    <textarea name="description" id="description" class="form-control">{{ $edit->title }}</textarea>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Create New Advert" class="btn btn-info">
                </div>
            </form>
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@endsection