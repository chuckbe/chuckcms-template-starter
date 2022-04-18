@extends($template->hintpath.'::templates.' . $template->slug . '.layouts.base')

@section('title')
    {{ $page->title }}
@endsection

@section('meta')
<meta http-equiv="x-ua-compatible" content="ie=edge">
@php 
	$lang = \LaravelLocalization::getCurrentLocale();
@endphp
@php 
	$meta = $page->meta[$lang];
@endphp
@if( array_key_exists('title', $meta) )
<meta name="title" content="{{ $meta['title'] }}">
@endif
@if(array_key_exists('description', $meta))
<meta name="description" content="{{ $meta['description'] }}">
@endif
@if(array_key_exists('keywords', $meta))
<meta name="keywords" content="{{ $meta['keywords'] }}">
@endif
@if(array_key_exists('robots', $meta))
<meta name="robots" content="{{ $meta['robots'] }}">
@endif
@if(array_key_exists('googlebots', $meta))
<meta name="googlebots" content="{{ $meta['googlebots'] }}">
@endif
<meta name="google" content="notranslate">
@if( ChuckSite::getSetting('integration.g-site-verification') !== null )
<meta name="google-site-verification" content="{{ ChuckSite::getSetting('integration.g-site-verification') }}">
@endif
<meta name="generator" content="ChuckCMS">
@if($page->isHp == 1)
<link rel="canonical" href="{{ ChuckSite::getSetting('domain') }}">
<meta property="og:url" content="{{ ChuckSite::getSetting('domain') }}">
<meta name="twitter:url" content="{{ ChuckSite::getSetting('domain') }}">
@else
<link rel="canonical" href="{{ ChuckSite::getSetting('domain') . '/' . $page->slug }}">
<meta property="og:url" content="{{ ChuckSite::getSetting('domain') . '/' . $page->slug }}">
<meta name="twitter:url" content="{{ ChuckSite::getSetting('domain') . '/' . $page->slug }}">
@endif
@if(array_key_exists('og-type', $meta))
<meta name="og:type" content="{{ $meta['og-type'] }}">
@endif
@if(array_key_exists('og-title', $meta))
<meta name="og:title" content="{{ $meta['og-title'] }}">
<meta name="twitter:title" content="{{ $meta['og-title'] }}">
<meta itemprop="name" content="{{ $meta['og-title'] }}">
@endif
@if(array_key_exists('og-image', $meta))
<meta name="og:image" content="{{ $meta['og-image'] }}">
<meta name="twitter:image" content="{{ $meta['og-image'] }}">
<meta itemprop="image" content="{{ $meta['og-image'] }}">
@endif
@if(array_key_exists('og-description', $meta))
<meta name="og:description" content="{{ $meta['og-description'] }}">
<meta name="twitter:description" content="{{ $meta['og-description'] }}">
<meta itemprop="description" content="{{ $meta['og-description'] }}">
@endif
@if(ChuckSite::getSite('name') !== null)
<meta property="og:site_name" content="{{ ChuckSite::getSite('name') }}">
@endif
<meta property="og:locale" content="{{ $lang }}">
@endsection

@section('css')
<link rel="stylesheet" href="{{ route('page.css', ['page' => $page->id]) }}">
@endsection

@section('scripts')
<script src="{{ route('page.js', ['page' => $page->id]) }}" type="text/javascript"></script>
@endsection

@section('content')

@if(class_exists(ChuckProduct::class))
<div class="container">
	<div class="row">
		@foreach(ChuckProduct::all() as $product)
        <div class="col-6 col-sm-4 col-lg-3">
            <div class="product-card">
                <a class="product-thumb" href="{{ ChuckProduct::fullUrl($product) }}">
                    <img src="{{ ChuckProduct::featuredImage($product) }}" class="img-fluid" alt="{{ ChuckProduct::title($product) }}">
                </a>
                <h3 class="product-title"><small><a href="{{ ChuckProduct::fullUrl($product) }}">{{ ChuckProduct::title($product) }}</a></small></h3>
                <h4 class="product-price text-right">@if(ChuckProduct::hasDiscount($product)) <del>{{ ChuckProduct::highestPrice($product) }}</del>{{ ChuckProduct::highestPrice($product) }} @else {{ ChuckProduct::lowestPrice($product) }} @endif</h4>
                <div class="product-buttons text-right">
                    <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist">
                        <i class="fas fa-heart"></i>
                    </button>
                    <button class="btn btn-outline-success btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!">Add to Cart</button>
                </div>
            </div>
        </div>
        @endforeach
	</div>
</div>
@endif
    @if($pageblocks !== null)
        @foreach($pageblocks as $pageblock)
            {!! $pageblock['body'] !!}
        @endforeach
    @endif
@endsection