@extends($template->hintpath.'::templates.' . $template->slug . '.layouts.base')

@section('title')
    Shopping Cart
@endsection

@section('meta')
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @php 
        $lang = \LaravelLocalization::getCurrentLocale();
    @endphp

    <link rel="canonical" href="{{ ChuckSite::getSetting('domain') . '/shopping-cart' }}">
    <meta property="og:url" content="{{ ChuckSite::getSetting('domain') . '/shopping-cart' }}">
    <meta name="twitter:url" content="{{ ChuckSite::getSetting('domain') . '/shopping-cart' }}">

    @if(ChuckSite::getSite('name') !== null)
    <meta property="og:site_name" content="{{ ChuckSite::getSite('name') }}">
    @endif
    <meta property="og:locale" content="{{ $lang }}">
@endsection

@section('css')

@endsection

@section('scripts')

@endsection

@section('content')
{{-- <div class="container">
    <div class="row">
        <div class="col-12 text-center text-lg-left">
            <h3 class="mt-5 d-inline-block pr-lg-5 mb-5 underline-cart position-relative" data-content="text">Je Winkelwagen</h3>
        </div>
    </div>
</div> --}}
<div class="container clearfix">
    <!-- Shopping cart table -->
    <div class="row" style="min-height:400px;">
        @if(ChuckCart::instance('shopping')->content()->count() > 0)
        @include($template->hintpath.'::templates.' . $template->slug . '.ecommerce.' . config('chuckcms-module-ecommerce.blade_layouts.cart_overview'))
        @else
        <div class="card-body text-center my-auto">
            <h4 class="mb-4">Winkelwagen is leeg</h4>
            <a href={{ URL::to('/') }}/producten>
                <button type="button" class="btn btn-lg btn-green-t md-btn-flat mt-2 {{-- btn-back --}}">Producten bekijken</button>
            </a>
        </div>
        @endif
        
    </div>
</div>
@endsection