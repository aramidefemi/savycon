@extends ('backend.layouts.master')

@section ('title', 'Freelancer Ads')

@section('page-header')
    <h1>
        Freelancer Ads
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
            @if($freelancers->count() > 0)
            @foreach ($freelancers as $freelance)
                <tr>
                   <td>{{ $freelance->id }}</td>
                   <td>{{ $freelance->user->name }}</td>
                   <td>{{ $freelance->title }}</td>
                   <td>{{ $freelance->description }}</td>
                   <td>{{ $freelance->price }}</td>
                   <td>{{ $freelance->tag }}</td>
                   <td style="text-align: center;"><a class="twitter-share-button  btn-sm btn-info"
  href="https://twitter.com/intent/tweet?text=https://savycon.com/single/freelance/{{ $freelance->id }}"
  data-size="large">
 Tweet</a><hr style="margin: 5px !important; color: white !important;"> 
<a class="twitter-share-button  btn-sm btn-info" style="background-color: #3b5998 !important;" href="http://www.facebook.com/sharer.php?s=100&p[title]={{ $freelance->title }}&p[summary]={{ $freelance->description }}&p[url]=http://savycon.com/single/freelance/{{$freelance->id}}&p[images][0]=https://savycon.com/{{urldecode($freelance->img_url)}}">
     Facebook
</a>
</td>
                </tr>
            @endforeach
            @else
            <td colspan="7">No Freelancer Ads available</td>
            @endif
        </tbody>
    </table>
    <div class="pull-right">
        {!! $freelancers->render() !!}
    </div>

    <div class="clearfix"></div>
@stop