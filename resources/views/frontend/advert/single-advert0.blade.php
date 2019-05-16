@extends('frontend.layouts.master')

@section('content')
@section('body','product-template-default single single-product woocommerce woocommerce-page')
<div class="row">
    <div class="listings-title">
        <div class="container">
            <div class="wrap-title">
                <h1>{{ $product->title }}</h1>
                <div class="bread">
                    <div class="breadcrumbs theme-clearfix">
                        <div class="container">
                            <ul class="breadcrumb">
                                <li><a href="{{ url("/") }}">Home</a><span class="go-page"></span></li>
                                <li><a href="{{ url("categories") }}">Categories</a><span class="go-page"></span></li>
                                <li class="active"><span>{{ $product->title }}</span></li>
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
        <div id="contents-detail" class="content col-lg-12 col-md-12 col-sm-12" role="main">
            <div id="container">
                <div id="content" role="main">
                    <div class="single-product clearfix">
                        <div id="product-01" class="product type-product status-publish has-post-thumbnail product_cat-accessories product_brand-global-voices first outofstock featured shipping-taxable purchasable product-type-simple">
                            <div class="product_detail row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 clear_xs">
                                    <div class="slider_img_productd">
                                        <!-- woocommerce_show_product_images -->
                                        <div id="product_img_01" class="product-images loading" data-rtl="false">
                                            <div class="product-images-container clearfix thumbnail-bottom">
                                                <!-- Image Slider -->
                                                <div class="slider product-responsive">
                                                    <div class="item-img-slider">
                                                        <div class="images">
                                                            <a href="{{ url("assets/Product/".$product->photos->first()->filename) }}" data-rel="prettyPhoto[product-gallery]" class="zoom">
                                                                <img width="300" height="300" src="{{ url("assets/Product/" .$product->photos->first()->filename) }}" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" srcset="{{ url("assets/Product/" .$product->photos->first()->filename) }} 300w, {{ url("assets/Product/" .$product->photos->first()->filename) }} 150w, assets/Product/{{ $product->photos->first()->filename }} 180w, {{ url("assets/Product/" .$product->photos->first()->filename) }} 600w" sizes="(max-width: 300px) 100vw, 300px">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    @foreach($product->photos as $photo)
                                                        <div class="item-img-slider">
                                                            <div class="images">
                                                                <a href="{{ url("assets/Product/" .$photo->filename) }}" data-rel="prettyPhoto[product-gallery]" class="zoom">
                                                                    <img width="600" height="600" src="{{ url("assets/Product/" .$photo->filename) }}" class="attachment-shop_single size-shop_single" alt="" srcset="{{ url("assets/Product/" .$photo->filename) }} 600w, {{ url("assets/Product/" .$photo->filename) }} 150w, {{ url("assets/Product/" .$photo->filename) }} 300w, {{ url("assets/Product/" .$photo->filename) }} 180w" sizes="(max-width: 600px) 100vw, 600px">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                </div>

                                                <!-- Thumbnail Slider -->
                                                <div class="slider product-responsive-thumbnail" id="product_thumbnail_247">
                                                    @foreach($product->photos as $photo)
                                                    <div class="item-thumbnail-product">
                                                        <div class="thumbnail-wrapper">
                                                            <img width="180" height="180" src="{{ url("assets/Product/" .$photo->filename) }}" class="attachment-shop_thumbnail size-shop_thumbnail" alt="" srcset="{{ url("assets/Product/" .$photo->filename) }} 180w, {{ url("assets/Product/" .$photo->filename) }} 150w, {{ url("assets/Product/" .$photo->filename) }} 300w, {{ url("assets/Product/" .$photo->filename) }} 600w" sizes="(max-width: 180px) 100vw, 180px">
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 clear_xs">
                                    <div class="content_product_detail">
                                        <h1 class="product_title entry-title">{{ $product->title }}</h1>

                                        <div class="reviews-content">
                                            <div class="star"></div>
                                            <a href="#reviews" class="woocommerce-review-link" rel="nofollow"><span class="count">0</span> Review(s)</a>
                                        </div>

                                        <div>
                                            <p class="price"><span class="woocommerce-Price-amount amount">${{ $product->price }}.00</span></p>
                                        </div>


                                        <div class="description" itemprop="description">
                                            <p>
                                                {{ $product->description }}
                                            </p>
                                        </div>


                                        <div class="social-share">
                                            <div class="title-share">Share</div>
                                            <div class="wrap-content">
                                                <a href="http://www.facebook.com/" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-facebook"></i></a>
                                                <a href="http://twitter.com/" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-twitter"></i></a>
                                                <a href="https://plus.google.com/" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-google-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tabs clearfix">
                            <div class="tabbable">
                                <ul class="nav nav-tabs">
                                    <li class="description_tab active">
                                        <a href="#tab-description" data-toggle="tab">Description</a>
                                    </li>
                                </ul>

                                <div class="clear"></div>

                                <div class=" tab-content">
                                    <div class="tab-pane active" id="tab-description">
                                        <h2>Product Description</h2>
                                        <p>
                                            {{ $product->description }}
                                        </p>

                                    </div>

                                </div>
                            </div>
                        </div>
                        @if($relatedProduct->isEmpty())
                            <div class="bottom-single-product theme-clearfix">
                                <div class="widget-1 widget-first widget sw_related_upsell_widget-2 sw_related_upsell_widget" data-scroll-reveal="enter bottom move 20px wait 0.2s">
                                    <div class="widget-inner">
                                        <div id="slider_sw_related_upsell_widget-2" class="sw-woo-container-slider related-products responsive-slider clearfix loading" data-lg="4" data-md="3" data-sm="2" data-xs="2" data-mobile="1" data-speed="1000" data-scroll="1" data-interval="5000" data-autoplay="false">
                                            @else
                                            <div class="resp-slider-container">
                                                <div class="box-slider-title">
                                                    <h2><span>Related Products</span></h2>
                                                </div>

                                                <div class="slider responsive">
                                                    @foreach($relatedProduct as $product)
                                                        <div class="item ">
                                                            <div class="item-wrap">
                                                                <div class="item-detail">
                                                                    <div class="item-img products-thumb">
                                                                        <a href="simple_product.html">
                                                                            <div class="product-thumb-hover">
                                                                                <img width="300" height="300" src="http://hsselite.com/walls/bw/srdr.php" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" srcset="assets/images/1903/49-300x300.jpg 300w, assets/images/1903/49-150x150.jpg 150w, assets/images/1903/49-180x180.jpg 180w, assets/images/1903/49.jpg 600w" sizes="(max-width: 300px) 100vw, 300px">
                                                                            </div>
                                                                        </a>

                                                                        <!-- add to cart, wishlist, compare -->
                                                                        <div class="item-bottom clearfix">
                                                                            <a rel="nofollow" href="#" class="button product_type_simple add_to_cart_button ajax_add_to_cart" title="Add to Cart">Add to cart</a>

                                                                            <a href="javascript:void(0)" class="compare button" rel="nofollow" title="Add to Compare">Compare</a>

                                                                            <div class="yith-wcwl-add-to-wishlist ">
                                                                                <div class="yith-wcwl-add-button show" style="display:block">
                                                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist">Add to Wishlist</a>
                                                                                    <img src="images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />
                                                                                </div>

                                                                                <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                                                                                    <span class="feedback">Product added!</span>
                                                                                    <a href="#" rel="nofollow">Browse Wishlist</a>
                                                                                </div>

                                                                                <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
                                                                                    <span class="feedback">The product is already in the wishlist!</span>
                                                                                    <a href="#" rel="nofollow">Browse Wishlist</a>
                                                                                </div>

                                                                                <div style="clear:both"></div>
                                                                                <div class="yith-wcwl-wishlistaddresponse"></div>
                                                                            </div>

                                                                            <div class="clear"></div>
                                                                            <a href="ajax/fancybox/example.html" data-fancybox-type="ajax" class="sm_quickview_handler-list fancybox fancybox.ajax">Quick View </a>
                                                                        </div>
                                                                    </div>

                                                                    <div class="item-content">
                                                                        <!-- rating  -->
                                                                        <div class="reviews-content">
                                                                            <div class="star"></div>
                                                                            <div class="item-number-rating">
                                                                                0 Review(s)
                                                                            </div>
                                                                        </div>
                                                                        <!-- end rating  -->

                                                                        <h4><a href="simple_product.html" title="turkey qui">Turkey Qui</a></h4>

                                                                        <!-- price -->
                                                                        <div class="item-price">
                                                                            $300.00
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="widget-2 widget-last widget sw_related_upsell_widget-3 sw_related_upsell_widget" data-scroll-reveal="enter bottom move 20px wait 0.2s">
                                    <div class="widget-inner"></div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection