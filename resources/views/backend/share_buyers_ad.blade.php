@extends ('backend.layouts.master')

@section ('title', 'Buyer Ads')

@section('page-header')
    <h1>
        Buyer Ads
        <small>Share Ads</small>
    </h1>
@endsection

@section ('breadcrumbs')
    <li><a href="{!!route('backend.dashboard')!!}"><i class="fa fa-dashboard"></i> {{ trans('menus.dashboard') }}</a></li>
    <li class="active">{!! link_to_route('admin.access.users.index', trans('menus.user_management')) !!}</li>
@stop


@section('content')


    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Owner</th>
            <th>Title</th>
            <th>Description</th>
            <th>Price</th>
            <th>Tag</th>
            <th>Share</th>
         </tr>
        </thead>
        <tbody>
            @if($buyers->count() > 0)
            @foreach ($buyers as $buyer)
                <tr>
                   <td>{{ $buyer->id }}</td>
                   <td>{{ $buyer->user->name }}</td>
                   <td>{{ $buyer->title }}</td>
                   <td>{{ $buyer->description }}</td>
                   <td>{{ $buyer->price }}</td>
                   <td>{{ $buyer->tag }}</td>
                   <td><a class="twitter-share-button  btn-sm btn-info"
  href="https://twitter.com/intent/tweet?text=http://savycon.com/single-advert/{{ $buyer->id }}"
  data-size="large">
<i class="fa fa-twitter"></i> Tweet</a>  
<a class="twitter-share-button  btn-sm btn-info" style="background-color: #3b5998 !important;" href="http://www.facebook.com/sharer.php?s=100&p[title]={{ $buyer->title }}&p[summary]={{ $buyer->description }}&p[url]=http://savycon.com/single-advert/{{$buyer->id}}&p[images][0]=http://savycon.com/{{urldecode($buyer->img_url)}}">
     Facebook
</a>
</td>
                </tr>
            @endforeach
            @else
            <td colspan="7">No Buyer Ads available</td>
            @endif
        </tbody>
    </table>
    <div class="pull-right">
        {!! $buyers->render() !!}
    </div>

    <div class="clearfix"></div>
@stop