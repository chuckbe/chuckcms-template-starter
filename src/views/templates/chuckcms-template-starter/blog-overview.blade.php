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
</style>
@endsection

@section('scripts')

@endsection

@section('content')
<div class="container py-5">
    <div class="row px-xl-5">
        <div class="col-12">
            <h1 class="display-5" style="font-weight: 500">Een blogpagina overview</h1>
        </div>
    </div>
    <div class="row pt-4 px-xl-5">
        <div class="col-12 col-lg-6 d-flex">
            <div class="me-auto rounded overflow-hidden tile h-100 scale" style="background-image: url({{asset('chuckbe/chuckcms-template-starter/img/pillows.jpg')}});"></div>
        </div>
        <div class="col-12 col-lg-6 col-xl-4">
            <div class="pe-xl-5 py-3">
                <p class="small text-muted mb-0">December 24, 2021</p>
                <p class="h2 lh-base">Hier komt een uitgelichte blogpost</p>
                <p class="pe-xl-5">
                    Lorem ipsum dolor et sit ut amet, 
                    consectetur adipiscing elit, sed do 
                    eiusmodet tempor et sit inci didunt ut 
                    laboore et dolore magna aliqua. Ut
                </p>
                <a href="#" class="text-color-main text-decoration-none mt-4">Lees meer</a>
            </div>
        </div>
    </div>
</div>
<div class="container py-5">
    <div class="row px-xl-5 justify-content-center">
        <div class="col-12 col-md-6 col-lg-5 py-4 d-flex">
            <div class="card border-0" style="max-width: 25rem">
                <div class="px-3">
                    <img src="{{asset('chuckbe/chuckcms-template-starter/img/pillows.jpg')}}" class="card-img-top rounded" alt="...">
                </div>
                <div class="card-body">
                    <p class="small text-muted mb-0">December 24, 2021</p>
                    <p class="card-title h4">
                        Hier Komt een uitgelichte blogpost
                    </p>
                    <p class="card-text pe-xl-5">
                        Lorem ipsum dolor sit amet, consectetur 
                        adipiscing elit, sed do eiusmod tempor 
                        incididunt ut labore et dolore magna
                    </p>
                    <a href="#" class="text-color-main text-decoration-none mt-4">Lees meer</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-5 py-4 d-flex">
            <div class="card border-0" style="max-width: 25rem">
                <div class="px-3">
                    <img src="{{asset('chuckbe/chuckcms-template-starter/img/pillows.jpg')}}" class="card-img-top rounded" alt="...">
                </div>
                <div class="card-body">
                    <p class="small text-muted mb-0">December 24, 2021</p>
                    <p class="card-title h4">
                        Hier Komt een uitgelichte blogpost
                    </p>
                    <p class="card-text pe-xl-5">
                        Lorem ipsum dolor sit amet, consectetur 
                        adipiscing elit, sed do eiusmod tempor 
                        incididunt ut labore et dolore magna
                    </p>
                    <a href="#" class="text-color-main text-decoration-none mt-4">Lees meer</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-5 py-4 d-flex">
            <div class="card border-0" style="max-width: 25rem">
                <div class="px-3">
                    <img src="{{asset('chuckbe/chuckcms-template-starter/img/pillows.jpg')}}" class="card-img-top rounded" alt="...">
                </div>
                <div class="card-body">
                    <p class="small text-muted mb-0">December 24, 2021</p>
                    <p class="card-title h4">
                        Hier Komt een uitgelichte blogpost
                    </p>
                    <p class="card-text pe-xl-5">
                        Lorem ipsum dolor sit amet, consectetur 
                        adipiscing elit, sed do eiusmod tempor 
                        incididunt ut labore et dolore magna
                    </p>
                    <a href="#" class="text-color-main text-decoration-none mt-4">Lees meer</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-5 py-4 d-flex">
            <div class="card border-0" style="max-width: 25rem">
                <div class="px-3">
                    <img src="{{asset('chuckbe/chuckcms-template-starter/img/pillows.jpg')}}" class="card-img-top rounded" alt="...">
                </div>
                <div class="card-body">
                    <p class="small text-muted mb-0">December 24, 2021</p>
                    <p class="card-title h4">
                        Hier Komt een uitgelichte blogpost
                    </p>
                    <p class="card-text pe-xl-5">
                        Lorem ipsum dolor sit amet, consectetur 
                        adipiscing elit, sed do eiusmod tempor 
                        incididunt ut labore et dolore magna
                    </p>
                    <a href="#" class="text-color-main text-decoration-none mt-4">Lees meer</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-5 py-4 d-flex">
            <div class="card border-0" style="max-width: 25rem">
                <div class="px-3">
                    <img src="{{asset('chuckbe/chuckcms-template-starter/img/pillows.jpg')}}" class="card-img-top rounded" alt="...">
                </div>
                <div class="card-body">
                    <p class="small text-muted mb-0">December 24, 2021</p>
                    <p class="card-title h4">
                        Hier Komt een uitgelichte blogpost
                    </p>
                    <p class="card-text pe-xl-5">
                        Lorem ipsum dolor sit amet, consectetur 
                        adipiscing elit, sed do eiusmod tempor 
                        incididunt ut labore et dolore magna
                    </p>
                    <a href="#" class="text-color-main text-decoration-none mt-4">Lees meer</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-5 py-4 d-flex">
            <div class="card border-0" style="max-width: 25rem">
                <div class="px-3">
                    <img src="{{asset('chuckbe/chuckcms-template-starter/img/pillows.jpg')}}" class="card-img-top rounded" alt="...">
                </div>
                <div class="card-body">
                    <p class="small text-muted mb-0">December 24, 2021</p>
                    <p class="card-title h4">
                        Hier Komt een uitgelichte blogpost
                    </p>
                    <p class="card-text pe-xl-5">
                        Lorem ipsum dolor sit amet, consectetur 
                        adipiscing elit, sed do eiusmod tempor 
                        incididunt ut labore et dolore magna
                    </p>
                    <a href="#" class="text-color-main text-decoration-none mt-4">Lees meer</a>
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