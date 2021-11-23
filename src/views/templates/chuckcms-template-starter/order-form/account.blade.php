@extends('chuckcms-template-starter::templates.' . $template->slug . '.layouts.base')

@section('title')
Mijn Account
@endsection

@section('meta')
<meta http-equiv="x-ua-compatible" content="ie=edge">
@php 
	$lang = \LaravelLocalization::getCurrentLocale();
@endphp
<meta name="google" content="notranslate">
<meta name="generator" content="ChuckCMS">
@if(ChuckSite::getSite('name') !== null)
<meta property="og:site_name" content="{{ ChuckSite::getSite('name') }}">
@endif
<meta property="og:locale" content="{{ $lang }}">

<link rel="manifest" href="{{ asset('my-account-folder/manifest.json') }}" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-title" content="ChuckSite::getSite('name')">

<meta name="apple-mobile-web-app-status-bar-style" content="white">
<meta name="apple-mobile-web-app-status-bar" content="#E72C70" />
<meta name="theme-color" content="#F7F249" />

<link rel="apple-touch-icon" href="{{ asset('my-account-folder/apple-touch-icon.png') }}" />
<link rel="apple-touch-icon" sizes="57x57" href="{{ asset('my-account-folder/apple-touch-icon-57x57.png') }}" />
<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('my-account-folder/apple-touch-icon-72x72.png') }}" />
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('my-account-folder/apple-touch-icon-76x76.png') }}" />
<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('my-account-folder/apple-touch-icon-114x114.png') }}" />
<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('my-account-folder/apple-touch-icon-120x120.png') }}" />
<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('my-account-folder/apple-touch-icon-144x144.png') }}" />
<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('my-account-folder/apple-touch-icon-152x152.png') }}" />
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('my-account-folder/apple-touch-icon-180x180.png') }}" />

@endsection

@section('css')

@endsection

@section('scripts')

@endsection

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Mijn account</li>
        </ol>
    </nav>
</div>

<div class="container">
    <div class="row mb-3">
        <div class="col-sm-12">
            <h2 class="font-weight-bold">Hey {{ $customer->surname }},</h2>
            <span class="font-weight-bold">welkom terug!</span>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="row">
                <div class="col-12 text-left px-3 mb-3">
                    <div class="bg-light shadow-sm rounded p-3">
                        <p class="lead">Je hebt momenteel:</p>
                        <div class="row">
                            <div class="col">
                                <h1>{{ $customer->json['loyalty_points'] ?? 0 }}</h1>
                            </div>
                            <div class="col my-auto text-right">
                                <a href="{{ URL::to('/mijn-account/punten-inruilen') }}" class="btn btn-outline-primary btn-sm">Punten Inruilen ></a>
                            </div>
                        </div>
                        <span>punten</span>
                    </div>
                </div>
                <div class="col-12 text-left px-3 mb-3">
                    <div class="bg-light shadow-sm rounded p-3">
                        <p class="lead">Je hebt momenteel:</p>
                        <div class="row">
                            <div class="col">
                                <h1>{{ count($customer->coupons) ?? 0 }}</h1>
                            </div>
                            <div class="col my-auto text-right">
                                <a href="{{ URL::to('/mijn-account/coupons') }}" class="btn btn-outline-primary btn-sm">Coupons gebruiken ></a>
                            </div>
                        </div>
                        <span>coupons beschikbaar</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="row">
                <div class="col-12 text-center px-3 mb-3">
                    <div class="bg-light shadow-sm rounded py-3">
                        <p class="lead">Jouw QR-code</p>
                        <img src="{!! 'data:image/png;base64,' . DNS2D::getBarcodePNG(Auth::user()->email, 'QRCODE',10,10) !!}" alt="barcode" class="img-responsive text-center" style="margin-left:auto;margin-right:auto;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection