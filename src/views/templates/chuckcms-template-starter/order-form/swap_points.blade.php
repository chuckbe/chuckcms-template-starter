@extends('chuckcms-template-starter::templates.' . $template->slug . '.layouts.base')

@section('title')
Punten inruilen
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
@if(session()->has('no_coupon'))
<script>
$(document).ready(function() {
    $('#no_couponModal').modal('show');
});
</script>
@endif

@if(session()->has('not_enough_points'))
<script>
$(document).ready(function() {
    $('#notEnoughPointsModal').modal('show');
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
            <h2 class="font-weight-bold">Punten inruilen</h2>
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
                                <a href="{{ URL::to('/mijn-account/coupons') }}" class="btn btn-outline-primary btn-sm">Coupons gebruiken ></a>
                            </div>
                        </div>
                        <span>coupons beschikbaar</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="row">
                @foreach($rewards as $rewardKey => $reward)
                <div class="col-md-3 col-sm-6 mb-20">
                    <div class="image_wrapper position-relative">
                        <img src="{{ asset($reward->image) }}" class="img-fluid rounded" alt="">
                        <span class="badge badge-{{ (int)$customer->loyalty_points >= (int)$reward->points ? 'success' : 'secondary' }} position-absolute" style="top:10px;left:10px;">{{ $reward->points }} punten</span>
                    </div>
                    <div class="details">
                        <h5 class="font-weight-bold mt-2">{{ $reward->name }}</h5>
                        @if((int)$customer->loyalty_points >= (int)$reward->points)
                        <button class="btn btn-sm btn-outline-success float-right" data-toggle="modal" data-target="#reward{{ $rewardKey }}Modal">PUNTEN INRUILEN</button>
                        <div class="modal fade" id="reward{{ $rewardKey }}Modal" tabindex="-1" role="dialog" aria-labelledby="reward{{ $rewardKey }}ModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="reward{{ $rewardKey }}ModalLabel">Bevestiging</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <form action="{{ route('swap.points') }}" method="POST">
                                    <div class="modal-body">
                                        <h6 class="mt-20">In ruil voor {{ $reward->points }} punten, krijg jij één coupon voor:</h6>
                                        <h6 class="font-weight-bold mt-3 text-center">"{{ $reward->name }}"</h6>
                                    </div>

                                    <div class="modal-footer">
                                        <input type="hidden" name="_reward_id" value="{{ $reward->id }}">
                                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                                        <button class="btn btn-outline-success" type="submit">MIJN PUNTEN INRUILEN</button>
                                    </div>
                                </form>
                            </div>
                          </div>
                        </div>
                        @else
                        <button class="btn btn-sm btn-outline-secondary float-right disabled" disabled>{{ $reward->points - (int)$customer->json['loyalty_points'] }} PUNTEN TEKORT</button>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>




@if(session()->has('no_coupon'))
<div class="modal fade" id="no_couponModal" tabindex="-1" role="dialog" aria-labelledby="no_couponModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="no_couponModalLabel">Woops</h4>
        </div>
        <div class="modal-body">
            <h6 class="mt-20 mb-20">Er is iets misgegaan, de coupon bestaat niet meer!</h6>
        </div>

        <div class="modal-footer">
            <button class="button large" data-dismiss="modal" aria-label="Close">SLUITEN</button>
        </div>
    </div>
  </div>
</div>
@endif

@if(session()->has('not_enough_points'))
<div class="modal fade" id="notEnoughPointsModal" tabindex="-1" role="dialog" aria-labelledby="notEnoughPointsModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="notEnoughPointsModalLabel">Woops</h4>
        </div>
        <div class="modal-body">
            <h6 class="mt-20 mb-20">Helaas heb je nog niet genoeg punten voor deze coupon!</h6>
        </div>

        <div class="modal-footer">
            <button class="button large" data-dismiss="modal" aria-label="Close">SLUITEN</button>
        </div>
    </div>
  </div>
</div>
@endif

@endsection