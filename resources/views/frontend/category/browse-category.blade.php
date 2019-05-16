@extends('frontend.layouts.master')

@section('content')
@section('body','product-template-default single single-product woocommerce woocommerce-page')
<div class="row">
    <div class="listings-title">
        <div class="container">
            <div class="wrap-title">
                <h1>Turkey Qui</h1>
                <div class="bread">
                    <div class="breadcrumbs theme-clearfix">
                        <div class="container">
                            <ul class="breadcrumb">
                                <li><a href="home_page_1.html">Home</a><span class="go-page"></span></li>
                                <li><a href="group_product.html">Group Product</a><span class="go-page"></span></li>
                                <li class="active"><span>Turkey Qui</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div id="contents" role="main" class="main-page col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="post-6 page type-page status-publish hentry">
                <div class="entry-content">
                    <div class="entry-summary">
                        <div id="sw_deal_01" class="sw-hotdeal ">
                            <div class="sw-hotdeal-content">
                                @if($browseProducts->isEmpty())
                                    <p class="alert alert-danger">Product Not Available at this time</p>
                                @else
                                    @foreach($browseProducts as $product)
                                        <div class="item-product col-lg-3 col-md-3 col-sm-4 col-xs-6">
                                            <div class="item-detail">
                                                <div class="item-img products-thumb">
                                                    <span class="onsale">Sale!</span>
                                                    <a href="{{ url("single/advert/$product->id") }}">
                                                        <div class="product-thumb-hover">
                                                            <img width="300" height="300" src="{{ url("assets/Product/" .$product->photos->first()->filename) }}" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" srcset="{{ url("assets/Product/" .$product->photos->first()->filename) }} 300w, {{ url("assets/Product/" .$product->photos->first()->filename) }} 150w, assets/Product/{{ $product->photos->first()->filename }} 180w, {{ url("assets/Product/" .$product->photos->first()->filename) }} 600w" sizes="(max-width: 300px) 100vw, 300px">

                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="item-content ">
                                                    <!-- rating  -->
                                                    <div class="reviews-content">
                                                        <div class="star"></div>
                                                        <div class="item-number-rating">
                                                            0 Review(s)
                                                        </div>
                                                    </div>
                                                    <!-- end rating  -->

                                                    <h4 class="text-center"><a href="{{ url("single/advert/$product->id") }}" title="{{ $product->title }}">{{ $product->title }}</a></h4>
                                                    <hr>
                                                    <!-- price -->
                                                    <div class="item-price text-cesnter">
                                                        <span>
                                                           {{ $product->price_type }} ||
                                                        </span>

                                                        <ins>
                                                            {{ $product->price }}
                                                        </ins>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection