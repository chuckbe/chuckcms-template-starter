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
        background-color: #f7f7f7;
    }
    .product .addtocarticon{
        pointer-events: none;
        opacity: 0;
        transition: 0.75ms ease all;
    }
    .product:hover .addtocarticon{
        pointer-events: all;
        opacity: 1;
    }
</style>
@endsection

@section('scripts')

@endsection

@section('content')
<div class="container pb-5">
    <div class="row pt-0 pb-3 py-lg-5 flex-column-reverse flex-lg-row">
        <div class="col-12 col-lg-6 px-0 px-lg-5">
            <div class="ms-0 ms-xl-5 me-auto rounded overflow-hidden tile h-100 scale" style="background-image: url({{asset('chuckbe/chuckcms-template-starter/img/pillows.jpg')}})"></div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="py-5 pe-lg-5 me-lg-5">
                <h1 class="lh-sm">
                    Hier komt de titel van je 
                    <span class="underline position-relative fw-600">boeiende</span>
                    tekstblock
                </h1>
                <p class="pt-3">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro 
                    consequuntur quaerat quas delectus, esse rerum vel sed atque 
                    obcaecati error hic debitis sint cupiditate optio numquam, 
                    corrupti natus pariatur laborum.
                </p>
                <p class="pt-3">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro 
                    consequuntur quaerat quas delectus, esse rerum vel sed atque 
                    obcaecati error hic debitis sint cupiditate optio numquam, 
                    corrupti natus pariatur laborum.
                </p>
                <a href="#" class="text-color-main"><span class="pe-2"><i class="fas fa-chevron-circle-down"></i></span>Bekijk de volledige winkel</a>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row pt-0 pb-3 py-lg-5 justify-content-center">
        <div class="col-12 col-md-8 col-lg-7 col-xl-6">
            <p class="h2 text-center lh-sm">
                Hier komen enkele 
                <span class="underline position-relative fw-600">interessante</span>
                producten of diensten
            </p>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-xl-10">
            <div class="row">
                <div class="col-12 d-flex">
                    <div class="ms-auto">
                        <select class="form-control border-0 shoporderoption">
                            <option selected>Nieuwste</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                    </div>
                </div>
                @foreach(ChuckProduct::all() as $product)
                <div class="col-12 col-md-6 col-lg-4 p-3">
                    <div class="card border-0 p-xl-3 product">
                        <div class="p-3 position-relative">
                            <a href="{{ChuckProduct::fullUrl($product)}}"><img src="{{asset($product->json['images']['image0']['url'])}}" class="card-img-top shop-img rounded" alt="..."></a>
                            <div class="d-flex w-100 position-absolute bottom-0 end-0 px-3 addtocarticon"><a href="{{ChuckProduct::fullUrl($product)}}" class="text-color-main ms-auto"><i class="fas fa-cart-plus"></i></a></div>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ChuckProduct::title($product)}} - <b>{{ChuckProduct::lowestPrice($product)}}</b></p>
                        </div>
                    </div>
                </div> 
                @endforeach
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