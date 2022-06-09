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
<style>
    .cartnav a.active{
        color: var(--main-color);
    }
    .cartnav .cartnavitem{
        display: flex;
        color: #848484;
    }
    .cartarrow {
        color: #848484;
        transform: rotate(90deg);
        transform-origin: 6px;
    }
    .cartnav .cartnavitem.active .cartnavnumber{
        background: var(--main-color) !important;
    }
    .cartnavnumber{
        background: #848484;
        border-radius: 50%;
        text-align: center;
        width: 1.25rem;
        height: 1.25rem;
    }
    @media (min-width: 768px) {
        .cartarrow {
            transform: rotate(0);
            transform-origin: 0;
        }
    }
</style>
@endsection

@section('scripts')

@endsection

@section('content')
<div class="container px-xl-5 py-3 py-md-5">
    @include($template->hintpath.'::templates.' . $template->slug . '.ecommerce.' . config('chuckcms-module-ecommerce.blade_layouts.cart_overview'))
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
<div class="container clearfix d-none">
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