@extends($template->hintpath.'::templates.' . $template->slug . '.layouts.base')

@section('title')
    {{ $page->title }}
@endsection

@section('meta')
@php 
$lang = \LaravelLocalization::getCurrentLocale();
@endphp
@include('chuckcms::meta.tags', ['page' => $page])
@endsection

@section('css')
<style>
    .star-block .small {
        font-size: 0.75rem;
    }
    .shoporderoption{
        -webkit-appearance: none;
        -moz-appearance: none;
        background: transparent;
        background-image: url("data:image/svg+xml;utf8,<svg fill='rgb(255, 118, 0)' height='24' viewBox='0 0 24 24' width='24' xmlns='http://www.w3.org/2000/svg'><path d='M7 10l5 5 5-5z'/><path d='M0 0h24v24H0z' fill='none'/></svg>");
        background-repeat: no-repeat;
        background-position-x: 100%;
        background-position-y: 40%;
        border: 1px solid #dfdfdf;
        border-radius: 2px;
        margin-right: 1rem;
        padding: 0 1rem;
    }
    .shoporderoption option:hover,  .shoporderoption option:focus{
        background: rgba(255, 118, 0, 0.5) !important;
    }
    .shoporderoption:hover, .shoporderoption:focus {
        box-shadow: none;
    }
    .shop-img {
        height: 350px;
        object-fit: contain;
        object-position: center;
    }
    .addtowishlist:hover i, .addtowishlist:focus i {
        font-weight: 900;
    }
    .chuckradiobtn:checked {
        background-color: var(--main-color);
        border-color: var(--main-color);
        box-shadow: none;
        background-image: none !important;
    }
    
    .product-variations img{
        border-color: transparent;
    }
    .product-variations img:hover, .product-variations img.selected{
        border: 2px solid var(--main-color);
    }
    .product-tile {
        background-size: contain;
        background-repeat: no-repeat;
        min-height: 400px;
    }
    @media (min-width: 992px) {
        .product-variations {
            position: absolute;
        }
    }
</style>
@endsection

@section('scripts')

@endsection

@section('content')
<div class="container pb-5">
    <div class="row pt-0 pb-3 py-lg-5 flex-column flex-lg-row">
        <div class="col-12 col-lg-6 px-0 px-lg-5 position-relative">
            <div class="ms-0 ms-xl-5 me-auto rounded overflow-hidden tile product-tile h-100 scale" style="background-image: url({{asset('chuckbe/chuckcms-template-starter/img/chair-white.jpg')}})"></div>
            <div class="row gx-5 justify-content-center product-variations bottom-0">
                <div class="col-3 col-md-2 col-lg-3 col-xl-2 px-3">
                    <img class="img-thumbnail rounded shadow border-main-color selected" src="{{asset('chuckbe/chuckcms-template-starter/img/chair-white.jpg')}}">
                </div>
                <div class="col-3 col-md-2 col-lg-3 col-xl-2 px-3">
                    <img class="img-thumbnail rounded shadow border-main-color" src="{{asset('chuckbe/chuckcms-template-starter/img/chair-light-turquoise.jpg')}}">
                </div>
                <div class="col-3 col-md-2 col-lg-3 col-xl-2 px-3">
                    <img class="img-thumbnail rounded shadow border-main-color" src="{{asset('chuckbe/chuckcms-template-starter/img/chair-dark-grey.jpg')}}">
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="py-5 pe-xl-5 me-lg-5">
                <h1 class="lh-sm h2">
                    Lorem ipsum dolor sit amet, consectetur
                </h1>
                <div class="d-flex flex-column flex-md-row">
                    <div class="d-flex">
                        <div class="star-block pb-0 pb-md-3 pb-lg-0">
                            <span class="fa fa-star checked small" aria-hidden="true"></span>
                            <span class="fa fa-star checked small" aria-hidden="true"></span>
                            <span class="fa fa-star checked small" aria-hidden="true"></span>
                            <span class="fa fa-star checked small" aria-hidden="true"></span>
                            <span class="fal fa-star checked small" aria-hidden="true"></span>
                        </div>
                        <span class="text-muted small d-block lh-lg px-3">1234 reviews</span>
                    </div>
                    <a href="#" class="text-decoration-none addtowishlist py-2 py-md-0"><i class="far fa-heart text-color-main"></i><span class="text-muted small lh-lg px-1">voeg toe aan wishlist</span></a>
                </div>
                <p class="pt-3">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro 
                    consequuntur quaerat quas delectus, esse rerum vel sed atque 
                    obcaecati error hic debitis sint cupiditate optio numquam, 
                    corrupti natus pariatur laborum.
                </p>
                <div>
                    <p class="text-muted">Kleur</p>
                    <div class="d-flex">
                        <div class="form-check pe-3">
                            <input class="form-check-input chuckradiobtn" type="radio" name="color" id="color1" checked="checked">
                            <label class="form-check-label small" for="color1">
                            White
                            </label>
                        </div>
                        <div class="form-check pe-3">
                            <input class="form-check-input chuckradiobtn" type="radio" name="color" id="color2">
                            <label class="form-check-label small" for="color2">
                                turquoise
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input chuckradiobtn" type="radio" name="color" id="color3">
                            <label class="form-check-label small" for="color3">
                                Dark-grey
                            </label>
                        </div>
                    </div>
                </div>
                <button class="btn chuck-btn bg-main-color text-white px-4 rounded d-flex flex-row mt-4"><span class="btn-text">Button #1</span><span class="after">></span></button>
            </div>
        </div>
    </div>
</div>
<div class="container">  
    <div class="row justify-content-center">
        <div class="col-12 col-xl-10">
            <div class="row pt-0 pb-3 py-lg-5">
                <div class="col-12 col-md-8 col-lg-6 col-xl-6">
                    <p class="h2 lh-sm">
                        Andere artikelen die je misschien
                        <span class="underline position-relative fw-600">interessante</span>
                        vind
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4 p-3">
                    <div class="card border-0 p-xl-3">
                        <div class="px-3">
                            <img src="{{asset('chuckbe/chuckcms-template-starter/img/NicePng_chair-front-view-png_8010222.png')}}" class="card-img-top shop-img rounded" alt="...">
                        </div>
                        <div class="card-body">
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur - <b>€499</b></p>
                        </div>
                    </div>
                </div> 
                <div class="col-12 col-md-6 col-lg-4 p-3">
                    <div class="card border-0 p-xl-3">
                        <div class="px-3">
                            <img src="{{asset('chuckbe/chuckcms-template-starter/img/pngkey.com-vintage-design-png-4128831.png')}}" class="card-img-top shop-img rounded" alt="...">
                        </div>
                        <div class="card-body">
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur - <b>€499</b></p>
                        </div>
                    </div>
                </div> 
                <div class="col-12 col-md-6 col-lg-4 p-3">
                    <div class="card border-0 p-xl-3">
                        <div class="px-3">
                            <img src="{{asset('chuckbe/chuckcms-template-starter/img/pngkey.com-old-chair-png-4074957.png')}}" class="card-img-top shop-img rounded" alt="...">
                        </div>
                        <div class="card-body">
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur - <b>€499</b></p>
                        </div>
                    </div>
                </div> 
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
	@if($pageblocks !== null)
        @foreach($pageblocks as $pageblock)
            {!! $pageblock['body'] !!}
        @endforeach
    @endif

@endsection