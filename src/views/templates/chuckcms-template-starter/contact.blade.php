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
<style>
    .contact-form .form-group:hover .form-control, .contact-form .form-group .form-control:focus{
      border-color: var(--main-color) !important;
      box-shadow: none;
    }
    .form-top .form-group:hover label {
        color: var(--main-color) !important;
    }
    .social-logins a{
      color: var(--main-color) !important;
    }
    .form-top .form-control::placeholder{
        color: #868686 !important;
    }
    .form-top textarea{
        height: auto !important;
    }
</style>
@endsection

@section('scripts')

@endsection

@section('content')
<div class="container pb-5">
    <div class="row py-5 px-xl-5 justify-content-center flex-column-reverse flex-lg-row">
        <div class="col-12 col-lg-6 px-xl-5 pt-5 pt-lg-0">
            <p class="h2 lh-base pe-xl-5">
                Neem vrijblijvend contact met ons op
            </p>
            <div class="">
              <form class="contact-form form-top" id="ccms_form_contact" action="{{URL::to(`/`)}}/forms/validate" method="post">
                @csrf
                <div class="form-group py-3">
                    <label for="email" class="d-block text-color-main small">Email*</label>
                    <input type="text" class="form-control border-0 rounded-0 border-bottom border-2 border-dark" name="contact_email" id="contact_email"  placeholder="test@email.be" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required autofocus>
                </div>
                <div class="form-group py-3">
                    <label for="email" class="d-block text-color-main small">Telefoonnummer*</label>
                    <input type="text" id="contact_phone" class="form-control border-0 rounded-0 border-bottom border-2 border-dark" name="contact_phone" placeholder="Uw telefoonnummer" required>
                </div>
                <div class="form-group py-3">
                    <label for="email" class="d-block text-color-main small">Bericht*</label>
                    <textarea class="form-control border-0 rounded-0 border-bottom border-2 border-dark" placeholder="Uw bericht" name="contact_message" id="contact_message" rows="1" required></textarea>
                </div>
                <div class="d-flex flex-row pt-3">
                    <div class="mt-2">
                      <button class="btn chuck-btn bg-main-color text-white px-4 rounded d-flex flex-row" type="submit"><span class="btn-text">Button #1</span><span class="after">&gt;</span></button>
                    </div>
                    <div class="d-flex ms-auto">
                      <div class="my-auto">
                          <span class="fw-600">Of</span>
                          <span class="px-3 social-logins">
                            <a class="h5" href="#"><i class="fab fa-instagram"></i></a>
                            <a class="h5 ms-2" href="#"><i class="fab fa-facebook"></i></a>
                            <a class="h5 ms-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="h5 ms-2" href="#"><i class="fab fa-twitter"></i></a>
                          </span>
                      </div>
                    </div>
                </div>
                
              </form>
            </div>
        </div>
        <div class="col-12 col-lg-6 d-flex">
            <div class="me-0 me-xl-5 ms-auto rounded overflow-hidden tile h-100 scale" style="background-image: url({{asset('chuckbe/chuckcms-template-starter/img/map.jpg')}}); background-position: center"></div>
        </div>
    </div>
</div>
<div class="container-fluid bg-main-color">
    <div class="container py-5">
        <div class="row px-xl-5 justify-content-center">
            <div class="col-12 col-lg-6 col-xl-5 text-white pe-xl-5 py-lg-5">
                <p class="h2 lh-sm pe-xl-5">
                    Contacteer ons nu
                    <span class="position-relative fw-600">vrijblijvend
                        <svg class="position-absolute w-100 start-0" style="bottom: -1rem" version="1.1" id="Laag_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 0 841.9 65.4" style="enable-background:new 0 0 841.9 65.4;" xml:space="preserve">
                            <style type="text/css">
                                .st0{fill:none;stroke:#fff;stroke-width:11.064;stroke-linecap:round;}
                            </style>
                            <path id="Path_2" class="st0" d="M31.8,43.1c0,0,614.7-25.9,779,0"/>
                        </svg>
                    </span>
                </p>
                <div class="pe-xl-4">
                    <p class="py-5 pe-xl-5">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do 
                        eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut 
                        enim.
                    </p>
                </div>
            </div>
            <div class="col-12 col-lg-6 text-white">
                <div>
                    <form class="contact-form pt-4" id="ccms_form_contact" action="{{URL::to(`/`)}}/forms/validate" method="post">
                        @csrf        
                        <div class="row g-5 py-3">
                            <div class="col-12">
                                <input type="text" class="form-control" name="gegeven_1" id="gegeven_1"  placeholder="Gegevens #1" required>
                            </div>
                        </div>
                        <div class="row g-5 py-3">
                            <div class="col-12">
                                <input type="text" class="form-control" name="gegeven_1" id="gegeven_1"  placeholder="Gegevens #1" required>
                            </div>
                        </div>
                        <div class="row g-5 py-3">
                            <div class="col-12">
                                <input type="text" class="form-control" name="gegeven_1" id="gegeven_1"  placeholder="Gegevens #1" required>
                            </div>
                        </div>
                        {!! Honeypot::generate('chuck_telephone', 'chuck_email') !!}
                        <input type="hidden" value="contact" name="_form_slug">
                        <button class="btn bg-white chuck-btn shadow-sm px-4 py-2 rounded fw-600 me-auto d-flex flex-row mt-4" id="send_form_btn"><span class="btn-text">Button #1</span><span class="after">></span></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    @if($pageblocks !== null)
        @foreach($pageblocks as $pageblock)
            {!! $pageblock['body'] !!}
        @endforeach
    @endif
@endsection