@extends('frontend.layouts.master')

@section('content')
@section('body','product-template-default single single-product woocommerce woocommerce-page')
<div class="row">
    <div class="listings-title">
        <div class="container">
            <div class="wrap-title">
                <h1>Browse Categories</h1>
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
                                @foreach($categories as $category)
                                    <div class="item-product col-lg-3 col-md-3 col-sm-4 col-xs-6">
                                        <div class="item-detail">
                                            <div class="item-img products-thumb">
                                                <a href="{{ url("product/category/$category->id") }}">
                                                    <div class="product-thumb-hover">
                                                        <img width="300" height="300" src="{{ url("assets/images/1903/menu-bn1.jpg") }}" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" srcset="assets/images/1903/menu-bn1.jpg 300w, assets/images/1903/menu-bn1.jpg 150w, assets/images/1903/menu-bn1.jpg 180w, assets/images/1903/menu-bn1.jpg 600w" sizes="(max-width: 300px) 100vw, 300px">
                                                    </div>
                                                </a>

                                                <div class="sale-off">
                                                    -13%
                                                </div>
                                            </div>

                                            <div class="item-content">
                                                <h4 class="text-center text-muted"><a href="{{ url("product/category/$category->id") }}" title="{{ $category->cat_name }}">{{ $category->cat_name }}</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
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