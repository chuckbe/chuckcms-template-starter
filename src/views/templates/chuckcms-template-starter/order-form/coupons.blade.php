@extends('chuckcms-template-starter::templates.' . $template->slug . '.layouts.base')

@section('title')
Mijn coupons
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

<link rel="apple-touch-icon" href="{{ asset('mijn-account/apple-touch-icon.png') }}" />
<link rel="apple-touch-icon" sizes="57x57" href="{{ asset('mijn-account/apple-touch-icon-57x57.png') }}" />
<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('mijn-account/apple-touch-icon-72x72.png') }}" />
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('mijn-account/apple-touch-icon-76x76.png') }}" />
<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('mijn-account/apple-touch-icon-114x114.png') }}" />
<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('mijn-account/apple-touch-icon-120x120.png') }}" />
<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('mijn-account/apple-touch-icon-144x144.png') }}" />
<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('mijn-account/apple-touch-icon-152x152.png') }}" />
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('mijn-account/apple-touch-icon-180x180.png') }}" />
@endsection

@section('css')

@endsection

@section('scripts')
@if(session()->has('swapped'))
<script>
$(document).ready(function() {
    $('#swappedModal').modal('show');
});
</script>
@endif
@endsection

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ URL::to('/mijn-account') }}">Mijn Account</a></li>
            <li class="breadcrumb-item active" aria-current="page">Punten inruilen</li>
        </ol>
    </nav>
</div>

<div class="container">
    <div class="row mb-3">
        <div class="col-sm-12">
            <h2 class="font-weight-bold">Coupon gebruiken</h2>
            <span class="font-weight-bold">doe je hier!</span>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-6 text-left px-3 mb-3">
                    <div class="bg-light shadow-sm rounded p-3">
                        <p class="lead">Je hebt momenteel:</p>
                        <div class="row">
                            <div class="col">
                                <h1>{{ $customer->json['loyalty_points'] ?? 0 }}</h1>
                            </div>
                            <div class="col my-auto text-right">
                                <a href="{{ URL::to('/mijn-account') }}" class="btn btn-outline-primary btn-sm">Punten Sparen ></a>
                            </div>
                        </div>
                        <span>punten</span>
                    </div>
                </div>
                <div class="col-6 text-left px-3 mb-3">
                    <div class="bg-light shadow-sm rounded p-3">
                        <p class="lead">Je hebt momenteel:</p>
                        <div class="row">
                            <div class="col">
                                <h1>{{ count($customer->coupons) ?? 0 }}</h1>
                            </div>
                            <div class="col my-auto text-right">
                                <a href="{{ URL::to('/mijn-account/punten-inruilen') }}" class="btn btn-outline-primary btn-sm">Punten Inruilen ></a>
                            </div>
                        </div>
                        <span>coupons beschikbaar</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="row">
                @foreach($coupons as $couponKey => $coupon)
                <div class="col-md-3 col-sm-6 mb-20">
                    @if(!is_null($coupon->reward))
                    <div class="image_wrapper position-relative">
                        <img src="{{ asset($coupon->reward->image) }}" class="img-fluid rounded" alt="">
                        <span class="badge badge-{{ (int)$customer->loyalty_points >= (int)$coupon->reward->points ? 'success' : 'secondary' }} position-absolute" style="top:10px;left:10px;">{{ $coupon->reward->points }} punten</span>
                    </div>
                    <div class="details">
                        <h5 class="font-weight-bold mt-2">{{ $coupon->reward->name }}</h5>
                        @if($coupon->status == 'awaiting')
                        <button class="btn btn-sm btn-outline-success float-right" data-toggle="modal" data-target="#coupon{{ $couponKey }}Modal">COUPON INRUILEN</button>
                        <div class="modal fade" id="coupon{{ $couponKey }}Modal" tabindex="-1" role="dialog" aria-labelledby="coupon{{ $couponKey }}ModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="coupon{{ $couponKey }}ModalLabel">Laat deze QR code zien om je coupon in te ruilen!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body text-center">
                                    <img src="{!! 'data:image/png;base64,' . DNS2D::getBarcodePNG($coupon->number, 'QRCODE',10,10) !!}" alt="barcode" class="img-responsive text-center" style="margin-left:auto;margin-right:auto;margin-bottom:20px;margin-top:20px;">
                                    <p>{{ $coupon->reward->name }}</p>
                                </div>

                                <div class="modal-footer">
                                    
                                </div>
                            </div>
                          </div>
                        </div>
                        @else
                        <button class="btn btn-sm btn-outline-secondary float-right disabled" disabled>REEDS GEBRUIKT</button>
                        @endif
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>



@if(session()->has('swapped'))
<div class="modal fade" id="swappedModal" tabindex="-1" role="dialog" aria-labelledby="swappedModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="swappedModalLabel">Hoera!</h4>
        </div>
        <div class="modal-body">
            <h6 class="mt-20 mb-20">We hebben een nieuwe coupon in jouw account toegevoegd!</h6> 
            <h6 class="mb-20">Haast je snel naar een Donuttello winkel om deze in te ruilen!</h6>
        </div>

        <div class="modal-footer">
            <button class="button large" data-dismiss="modal" aria-label="Close">SLUITEN</button>
        </div>
    </div>
  </div>
</div>
@endif

@endsection