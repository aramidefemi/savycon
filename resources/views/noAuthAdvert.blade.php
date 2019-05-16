<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="@savycon">
        <meta name="twitter:creator" content="@savycon">
        <meta name="twitter:title" content="{{ $product->title }}">
        <meta name="twitter:description" content="{{ $product->description }}">
        @if($product->photos->last() == null)
            <meta name="twitter:image" content="http://savycon.com/download.png">
        @else
            <meta name="twitter:image" content="{{ url("assets/Product/" .$product->photos[0]->filename) }}">
        @endif
        
        
        <meta property="og:url" content="http://savycon.com/single/advert/{{ $product->id }}">
        <meta property="og:type" content="website">
        <meta property="og:title" content="{{ $product->title }}">
        <meta property="og:description" content="{{ $product->description }}">
        <meta property="og:image" content="{{ url("assets/Product/" .$product->photos[0]->filename) }}">
        <meta property="og:image:width" content="200">
        <meta property="og:image:height" content="200">
          
    <head>
    <body>
        
    </body>
</html>