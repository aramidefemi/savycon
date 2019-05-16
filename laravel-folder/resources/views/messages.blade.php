@extends('frontend.layouts.master')

@section('content')
    <style>
        body{
            background: #efefef;
        }
    </style>
    
    <div class="container">
        <div class="col-md-12 col-md-offset-0" style="margin-top: 20px;">
            <div class="panel panel-default card">
                <div class="panel-body">
                    <div class="row">
                      @foreach($all_messages as $messages)
                        <a href="/message/delete/{{$messages->id}}" class="btn btn-danger pull-right" style="padding: 2px !important; margin: 2px !important;">x</a>
                       <div class="well" style="overflow: auto !important;">
                           <small>Email: {{ $messages->email }}</small><br>
                           <small>Phone: {{ $messages->phone }}</small><br>
                           <small>Message: {{ $messages->message }}</small>
                           <form action="/message/reply" method="post" enctype="multipart/form-data">
                               {{ csrf_field() }}
                               <input type="hidden" name="message_id" value="{{ $messages->id }}">
                               @if(auth()->user()->user_type == 'buyer')
                                <input type="hidden" name="product_id" value="{{ $messages->p_id }}">
                               @endif
                               <input type="text" name="reply" class="form-control">
                               <br>
                               <input type="submit" value="Reply" required class="form-control btn btn-info"  style="width: 70px !important;">
                               
                           </form>
                           <i class="pull-right">{{ $messages->status }}</i>
                       </div>
                      
                      @endforeach
</div><!--row-->

                </div><!--panel body-->

            </div><!-- panel -->

        </div>
    </div>
    
    
    
@endsection