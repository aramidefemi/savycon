@extends('backend.layouts.master')

@section('page-header')
    <h1>
        New Category
    </h1>
@endsection


@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Create New Category</h3>
          <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <div class="box-body">
            {{--<form action="{{ url('admin/new/banner') }}" method="post" role="form" enctype="multipart/form-data">--}}
                {{--{{ csrf_field() }}--}}
                {{--<div class="form-group">--}}
                    {{--<label for="cat name"> Banner Images:</label>--}}
                    {{--<input type="file" name="image" class="form-control">--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<input type="submit" name="submit" value="Add New Banner" class="btn btn-info">--}}
                {{--</div>--}}
            {{--</form>--}}
            <div id="my-dropzone" class="fallback">
                <div class="dz-message needsclick">
                    Drop files here or click to upload.<br>
                    <span class="note needsclick"><strong>Only Image files are supported.</strong></span>
                </div>
            </div>
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@endsection

@section('after-scripts-end')
    <script>
        $(document).ready(function(){
            Dropzone.autoDiscover = false;
            $("div#my-dropzone").dropzone({
                paramName: 'image',
                url: '{{ url('admin/new/banner') }}',
                dictDefaultMessage: "Drag your images",
                clickable: true,
                enqueueForUpload: true,
                maxFilesize: 1,
                uploadMultiple: false,
                addRemoveLinks: false,
                acceptedFiles: 'image/*',
                accept: function(file, done) {
                    // TODO: Image upload validation
                    done();
                },
                sending: function(file, xhr, formData) {
                    // Pass token. You can use the same method to pass any other values as well such as a id to associate the image with for example.
                    formData.append("_token", $('meta[name=_token]').attr("content")); // Laravel expect the token post value to be named _token by default
                },
                init: function() {
                    this.on("success", function(file, response) {
                        // On successful upload do whatever :-)
                    });
                }
            });

        });
    </script>
@endsection
