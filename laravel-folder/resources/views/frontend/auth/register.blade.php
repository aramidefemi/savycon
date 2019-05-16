@extends('frontend.layouts.master')
<style>
	.card{
		border: 1px solid transparent;
		box-shadow: 0px 0px 4px rgba(110,110,110, .24);
		padding: 10px;
		padding-top: 20px;
		background: #fff;
	}
	.reg{
		background-color: #efefef;
		padding: 10px 20px;
	}
</style>
@section('content')
	@if($checker == 'buyer')
		@include('frontend.auth.account.buyer')
	@elseif($checker == 'freelance')
		@include('frontend.auth.account.freelance')
	@endif
@endsection
