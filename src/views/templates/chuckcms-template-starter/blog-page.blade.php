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
    @media (min-width: 1200px){
        .tile {
            max-width: 85%;
        }
    }
    .bg-color {
        background-color: #fff4ea;
    }
</style>
@endsection

@section('scripts')

@endsection

@section('content')
<div class="container py-3 py-lg-5">
    <div class="row px-xl-5">
        <div class="col-12">
            <p class="text-muted text-center mb-1">December 24, 2021</p>
            <h1 class="h2 text-center">Hier Komt een uitgelichte blogpost</h1>
            <div class="d-flex justify-content-center py-3">
                <span class="rounded bg-color text-dark lh-sm text-center py-1 px-2 mx-2">Artikel</span>
                <span class="rounded bg-color text-dark lh-sm text-center py-1 px-2 mx-2">Onderwerp</span>
                <span class="rounded bg-color text-dark lh-sm text-center py-1 px-2 mx-2">Kwestie</span>
                <span class="rounded bg-color text-dark lh-sm text-center py-1 px-2 mx-2">Artikel</span>
            </div>
        </div>
        <div class="col-12 py-3 px-xl-5">
            <img src="{{asset('chuckbe/chuckcms-template-starter/img/pillows.jpg')}}" class="img-fluid w-100 rounded" style="max-height: 450px; object-fit: cover;">
        </div>
    </div>
</div>
<div class="container py-3 px-xl-5 position-relative">
    <div class="row px-xl-5 justify-content-between position-relative">
        <div class="col-12 col-lg-10 col-xl-8 px-lg-5 mx-lg-5">
            <div class="blog-socials top-0 end-0 py-3">
                <ul class="list-unstyled d-flex">
                    <li class="py-2 px-2"><a class="h5 text-color-main" href="#"><i class="fab fa-facebook"></i></a></li>
                    <li class="py-2 px-2"><a class="h5 text-color-main" href="#"><i class="fab fa-twitter"></i></a></li>
                    <li class="py-2 px-2"><a class="h5 text-color-main" href="#"><i class="fab fa-linkedin-in"></i></a></li>
                    <li class="py-2 px-2"><a class="h5 text-color-main" href="#"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
            <p class="h5 lh-base">
                Lorem ipsum dolor sit amet, <b>consectetur adipiscing elit</b>, sed do 
                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut 
                enim ad <b>minim veniam</b>, quis nostrud exercitation ullamco laboris nisi
            </p>
            <p class="pt-3">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore 
                et dolore magna aliqua. Ut enim minim veniam, quis nostrud exercitation ullamco laboris nisi ut 
                aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do 
                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud 
                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, 
                consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ut 
                enim ad minim veniam, quis nostrud excercitation ullamco laboris nisi ut aliquip ex ea commodo 
                consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore 
                et dolore magna aliqua. Ut enim minim veniam, quis nostrud exercitation ullamco laboris nisi ut 
                aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do 
                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud 
                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, 
                consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ut 
                enim ad minim veniam, quis nostrud excercitation ullamco laboris nisi ut aliquip ex ea commodo 
                consequat.
            </p>
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