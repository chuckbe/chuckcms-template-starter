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
    <div class="row px-lg-5">
        <div class="col-12 d-flex flex-column flex-md-row">
            <h1 class="h2">Winkelmandje</h1>
        </div>
        <div class="col-12 d-flex flex-column flex-md-row cartnav py-5">
            <a href="#" class="text-decoration-none cartnavitem active">
                <span class="cartnavnumber text-white me-2 d-flex justify-content-center align-items-center small">1</span>
                Cart
            </a>
            <span class="px-md-3 px-lg-5 cartarrow"><i class="far fa-long-arrow-right"></i></span>
            <a href="#" class="text-decoration-none cartnavitem">
                <span class="cartnavnumber text-white me-2 d-flex justify-content-center align-items-center small">2</span>
                Verzending
            </a>
            <span class="px-md-3 px-lg-5 cartarrow"><i class="far fa-long-arrow-right"></i></span>
            <a href="#" class="text-decoration-none cartnavitem">
                <span class="cartnavnumber text-white me-2 d-flex justify-content-center align-items-center small">3</span>
                Betaling
            </a>
            <span class="px-md-3 px-lg-5 cartarrow"><i class="far fa-long-arrow-right"></i></span>
            <a href="#" class="text-decoration-none cartnavitem">
                <span class="cartnavnumber text-white me-2 d-flex justify-content-center align-items-center small">4</span>
                Controle & confirmatie
            </a>
        </div>
    </div>
    <div class="row px-lg-5 g-5">
        <div class="col-12 col-lg-8">
            <div class="bg-white shadow rounded">
                <div class="row py-3 justify-content-center">
                    <div class="col-2 col-md-1 col-lg-1 rounded align-items-center bg-grey p-3 d-flex justify-content-center align-items-center order-0 order-md-0">
                        <img class="img-fluid wishlist-item-image" src="{{asset('chuckbe/chuckcms-template-starter/img/pngkey.com-old-chair-png-4074957.png')}}">
                    </div>
                    <div class="col-5 col-md-3 col-xl-3 order-1 order-md-1">
                        <div class="d-flex h-100 justify-content-center flex-column pt-3 pt-md-0">
                            <span class="fw-bold">Lorem ipsum dolor</span>
                            <span class="text-muted small">Meubels</span>
                        </div>
                    </div>
                    <div class="col-4 col-md-2 col-lg-2 col-xl-2 text-center order-3 order-md-2">
                        <div class="d-flex h-100 w-100 py-3 py-md-0 justify-content-start justify-content-md-center align-items-center">
                            <div class="rounded-circle bg-dark" style="height: 1rem; width: 1rem;"></div>
                            <span class="px-2">Black</span>
                        </div>
                    </div>
                    <div class="col-4 col-md-2 col-lg-2 col-xl-2 order-4 order-md-3">
                        <div class="row h-100 justify-content-md-center align-items-center">
                            <div class="col-1 col-md-3 p-0 rounded-pill-left d-flex">
                                <button class="btn btn-blue-t btn-sm mt-0 ms-auto me-0 ce_subtractionCartProductBtn" style="background-color: #EAECEF; border-radius: 50% 0 0 50%;" type="button" data-product-id="" data-row-id=""><b>-</b></button>
                            </div>
                            <div class="col-6 col-md-6 mx-0 px-0">
                                <input type="number" class="form-control form-control-sm d-inline-block ce_productCartQuantityInput text-center border-0 rounded-0" min="1" max="" value="2" name="quantity" data-product-id="" data-row-id="" readonly>
                            </div>
                            <div class="col-1 col-md-3 p-0 d-flex">
                                <button class="btn btn-blue-t btn-sm mt-0 me-auto ce_additionCartProductBtn" type="button" data-product-id="" data-row-id="" style="background-color: #EAECEF; border-radius: 0% 50% 50% 0;"><b>+</b></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-8 col-md-2 col-lg-2 d-flex order-5 order-md-4">
                        <p class="fw-bold text-center mx-md-auto my-auto lh-lg h5 pt-0">€999</p>
                    </div>
                    <div class="col-2 col-md-1 d-flex justify-content-center align-items-center order-2 order-md-5">
                        <a href="#" class="bg-grey text-muted px-2 py-1 rounded-top rounded-right rounded-bottom rounded-left ms-auto my-3 m-md-0"><i class="fas fa-trash-alt"></i></a>
                    </div>
                </div>
                <div class="row py-3 justify-content-center">
                    <div class="col-2 col-md-1 col-lg-1 rounded align-items-center bg-grey p-3 d-flex justify-content-center align-items-center order-0 order-md-0">
                        <img class="img-fluid wishlist-item-image" src="{{asset('chuckbe/chuckcms-template-starter/img/pngkey.com-old-chair-png-4074957.png')}}">
                    </div>
                    <div class="col-5 col-md-3 col-xl-3 order-1 order-md-1">
                        <div class="d-flex h-100 justify-content-center flex-column pt-3 pt-md-0">
                            <span class="fw-bold">Lorem ipsum dolor</span>
                            <span class="text-muted small">Meubels</span>
                        </div>
                    </div>
                    <div class="col-4 col-md-2 col-lg-2 col-xl-2 text-center order-3 order-md-2">
                        <div class="d-flex h-100 w-100 py-3 py-md-0 justify-content-start justify-content-md-center align-items-center">
                            <div class="rounded-circle bg-dark" style="height: 1rem; width: 1rem;"></div>
                            <span class="px-2">Black</span>
                        </div>
                    </div>
                    <div class="col-4 col-md-2 col-lg-2 col-xl-2 order-4 order-md-3">
                        <div class="row h-100 justify-content-md-center align-items-center">
                            <div class="col-1 col-md-3 p-0 rounded-pill-left d-flex">
                                <button class="btn btn-blue-t btn-sm mt-0 ms-auto me-0 ce_subtractionCartProductBtn" style="background-color: #EAECEF; border-radius: 50% 0 0 50%;" type="button" data-product-id="" data-row-id=""><b>-</b></button>
                            </div>
                            <div class="col-6 col-md-6 mx-0 px-0">
                                <input type="number" class="form-control form-control-sm d-inline-block ce_productCartQuantityInput text-center border-0 rounded-0" min="1" max="" value="2" name="quantity" data-product-id="" data-row-id="" readonly>
                            </div>
                            <div class="col-1 col-md-3 p-0 d-flex">
                                <button class="btn btn-blue-t btn-sm mt-0 me-auto ce_additionCartProductBtn" type="button" data-product-id="" data-row-id="" style="background-color: #EAECEF; border-radius: 0% 50% 50% 0;"><b>+</b></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-8 col-md-2 col-lg-2 d-flex order-5 order-md-4">
                        <p class="fw-bold text-center mx-md-auto my-auto lh-lg h5 pt-0">€999</p>
                    </div>
                    <div class="col-2 col-md-1 d-flex justify-content-center align-items-center order-2 order-md-5">
                        <a href="#" class="bg-grey text-muted px-2 py-1 rounded-top rounded-right rounded-bottom rounded-left ms-auto my-3 m-md-0"><i class="fas fa-trash-alt"></i></a>
                    </div>
                </div>
            </div>
            <div class="d-flex w-100">
                <a href="#" class="ms-auto text-color-main text-decoration-none d-block my-3"><span class="pe-3"><i class="fas fa-long-arrow-left"></i></span>Terug naar winkel</a>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="bg-white shadow rounded p-3">
                <h5 class="text-center pb-3">Overzicht Winkelmandje</h5>
                <div class="row mx-0 py-2">
                    <div class="col-12 col-md-6 text-start text-muted">Prijs</div>
                    <div class="col-12 col-md-6 text-end"><span class="fw-bold">€999</span></div>
                </div>
                <div class="row mx-0 py-2">
                    <div class="col-12 col-md-6 text-start text-muted">korting</div>
                    <div class="col-12 col-md-6 text-end"><span class="fw-bold text-color-main">- €99</span></div>
                </div>
                <div class="row mx-0 py-2">
                    <div class="col-12 col-md-6 text-start text-muted">Totale Prijs</div>
                    <div class="col-12 col-md-6 text-end"><span class="fw-bold">€9999</span></div>
                </div>
                <button class="btn chuck-btn bg-main-color text-white px-4 rounded d-flex flex-row m-auto my-3" type="submit"><span class="btn-text">Button #1</span><span class="after">></span></button>
            </div>
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