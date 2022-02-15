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

@endsection

@section('scripts')

@endsection

@section('content')
<div class="container pb-5">
    <div class="row pt-0 pb-3 py-lg-5 flex-column-reverse flex-lg-row">
        <div class="col-12 col-lg-6">
            <div class="py-5">
                <h1 class="display-3 fw-normal lh-sm">
                    Hier komt een 
                    <span class="underline position-relative fw-600">slogan</span> over jouw 
                    onderneming
                </h1>
                <p class="py-3">
                    Lorem ipsum dolor sit amet, consectetur <br>
                    adipiscing elit. sed do eiusmod tempor
                </p>
                <button class="btn chuck-btn bg-main-color text-white px-4 rounded d-flex flex-row"><span class="btn-text">Button #1</span><span class="after">></span></button>
            </div>
        </div>
        <div class="col-12 col-lg-6 px-0 px-lg-2">
            <div class="headertile scale h-100"></div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row pt-0 pb-3 py-lg-5 justify-content-center">
        <div class="col-12 col-lg-8 col-xl-7">
            <p class="h1 text-center lh-sm">
                Hier komen enkele 
                <span class="underline position-relative fw-600">interessante</span>
                kenmerken of diensten
            </p>
        </div>
    </div>
    <div class="row py-5 gy-5 gx-0 gx-xl-5">
        <div class="col-12 col-lg-4">
            <div class="card text-center border-0">
                <span class="h2">
                    <i class="fas fa-medal text-color-main shadow-sm p-3 rounded"></i>
                </span>
                <div class="card-body pt-5">
                  <h4 class="card-title">Kenmerk nummer #1</h4>
                  <p class="card-text px-4 pt-3">
                      Lorem ipsum dolor sit amet,
                      consectetur adipiscing elit, sed do
                  </p>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="card text-center border-0">
                <span class="h2">
                    <i class="fas fa-chair text-color-main shadow-sm p-3 rounded"></i>
                </span>
                <div class="card-body pt-5">
                  <h4 class="card-title">Kenmerk nummer #2</h4>
                  <p class="card-text px-4 pt-3">
                      dolore magna aliqua. Ut enim ad minim 
                      veniam, quis nostrd exercitation
                  </p>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="card text-center border-0">
                <span class="h2">
                    <i class="fas fa-palette text-color-main shadow-sm p-3 rounded"></i>
                </span>
                <div class="card-body pt-5">
                  <h4 class="card-title">Kenmerk nummer #3</h4>
                  <p class="card-text px-4 pt-3">
                      ullamco laboris nisi ut aliquip ex ea 
                      commodo consequat.
                  </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row py-5">
        <div class="col-12 col-lg-6 d-flex">
            <div class="ms-0 ms-xl-5 me-auto rounded overflow-hidden tile h-100 scale" style="background-image: url({{asset('chuckbe/chuckcms-template-starter/img/pillows.jpg')}})"></div>
        </div>
        <div class="col-12 col-lg-6 py-5">
            <p class="h1 lh-sm">
                Hier komt de titel van je
                <span class="underline position-relative fw-600">boeiende</span>
                tekstblock
            </p>
            <div class="pe-xl-5">
                <p class="py-3 pe-xl-5">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do 
                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut 
                    enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                </p>
            </div>
            <button class="btn chuck-btn bg-main-color text-white px-4 rounded d-flex flex-row"><span class="btn-text">Button #1</span><span class="after">></span></button>
        </div>
    </div>
</div>
<div class="container">
    <div class="row py-5 flex-column-reverse flex-lg-row">
        <div class="col-12 col-lg-6 py-5 ps-xl-5">
            <p class="h1 lh-sm">
                Hier komt de titel van je
                <span class="underline position-relative fw-600">boeiende</span>
                tekstblock
            </p>
            <div class="">
                <p class="py-3">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do 
                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut 
                    enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                </p>
            </div>
            <button class="btn chuck-btn bg-main-color text-white px-4 rounded d-flex flex-row"><span class="btn-text">Button #1</span><span class="after">></span></button>
        </div>
        <div class="col-12 col-lg-6 d-flex">
            <div class="me-0 me-xl-5 ms-auto rounded overflow-hidden tile h-100 scale" style="background-image: url({{asset('chuckbe/chuckcms-template-starter/img/pillows.jpg')}})"></div>
        </div>
    </div>
</div>
<div class="container-fluid bg-main-color">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-7">
                <p class="h1 lh-sm text-white text-center">
                    Hier komen enkele interessante
                    kenmerken of diensten
                </p>
                <p class="text-white text-center py-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. sed do eiusmod tempor incididunt ut 
                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                </p>
                <button class="btn bg-white chuck-btn shadow-sm px-4 py-2 rounded fw-600 mx-auto d-flex flex-row"><span class="btn-text">Button #1</span><span class="after">></span></button>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row py-5">
        <div class="col-12 col-lg-6 py-5 ps-xl-5 my-lg-auto">
            <p class="h1 lh-sm">
                Hier komt de 
                <span class="underline position-relative fw-600">succesvolle</span>
                afgewerkte producten
            </p>
            <div class="">
                <p class="py-3">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do 
                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut 
                    enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi 
                    ut aliquip ex ea commodo consequat.
                </p>
            </div>
        </div>
        <div class="col-12 col-lg-6 py-lg-5 ps-xl-5">
            <div class="row g-0 g-lg-5 justify-content-center">
                <div class="col-12 col-md-4 col-lg-9 col-xl-7">
                    <div class="border-start py-0 px-3 numbercard">
                        <h3 class="fw-bold">9999</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-9 col-xl-7">
                    <div class="border-start py-0 px-3 numbercard">
                        <h3 class="fw-bold">9999</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-9 col-xl-7">
                    <div class="border-start py-0 px-3 numbercard">
                        <h3 class="fw-bold">9999</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container pb-5">
    <div class="row pt-0 pb-3 py-md-5 justify-content-center">
        <div class="col-12 col-md-8 col-lg-7 col-xl-5">
            <p class="h1 text-center lh-sm">
                Wat vinden 
                <span class="underline position-relative fw-600">gebruikers</span>
                van onze diensten?
            </p>
        </div>
    </div>
    <div class="row py-5 gy-5 gx-3 gx-xl-5">
        <div class="col-12 col-lg-4 px-xl-5">
            <div class="card text-center border-0 rounded shadow-sm">
                <div class="card-body py-3 px-5">
                  <p class="card-text">
                      Lorem ipsum dolor sit amet,
                      consectetur adipiscing elit, sed 
                      do eiusmod tempor incididunt 
                      ut labore et dolore magna 
                      aliqua. Ut enim ad minim veniam.
                  </p>
                  <img class="card-img-testimonial" src="{{asset('chuckbe/chuckcms-template-starter/img/person.jpg')}}">
                  <p class="card-text pt-3">
                    <span>Naam #1</span><br>
                    <span>Functie of bedrijf</span>
                    <div class="star-block px-md-5 pb-0 pb-md-3 pb-lg-0mx-auto">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star halfchecked"></span>
                    </div>
                  </p>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 px-xl-5">
            <div class="card text-center border-0 rounded shadow-sm">
                <div class="card-body py-3 px-5">
                  <p class="card-text">
                      Lorem ipsum dolor sit amet,
                      consectetur adipiscing elit, sed 
                      do eiusmod tempor incididunt 
                      ut labore et dolore magna 
                      aliqua. Ut enim ad minim veniam.
                  </p>
                  <img class="card-img-testimonial" src="{{asset('chuckbe/chuckcms-template-starter/img/person.jpg')}}">
                  <p class="card-text pt-3">
                    <span>Naam #1</span><br>
                    <span>Functie of bedrijf</span>
                    <div class="star-block px-md-5 pb-0 pb-md-3 pb-lg-0mx-auto">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star halfchecked"></span>
                    </div>
                  </p>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 px-xl-5">
            <div class="card text-center border-0 rounded shadow-sm">
                <div class="card-body py-3 px-5">
                  <p class="card-text">
                      Lorem ipsum dolor sit amet,
                      consectetur adipiscing elit, sed 
                      do eiusmod tempor incididunt 
                      ut labore et dolore magna 
                      aliqua. Ut enim ad minim veniam.
                  </p>
                  <img class="card-img-testimonial" src="{{asset('chuckbe/chuckcms-template-starter/img/person.jpg')}}">
                  <p class="card-text pt-3">
                    <span>Naam #1</span><br>
                    <span>Functie of bedrijf</span>
                    <div class="star-block px-md-5 pb-0 pb-md-3 pb-lg-0mx-auto">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star halfchecked"></span>
                    </div>
                  </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg-grey logos">
    <div class="container py-5">
        <div class="row g-5 justify-content-around align-items-center">
            <div class="col-6 col-md-2 p-4">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 923.08 303.86">
                    <g id="Layer_2" data-name="Layer 2">
                        <g id="Layer_1-2" data-name="Layer 1">
                        <path d="M395,159.91c0,43.71-34.2,75.93-76.17,75.93s-76.17-32.22-76.17-75.93c0-44,34.2-75.93,76.17-75.93S395,115.88,395,159.91Zm-33.34,0c0-27.32-19.82-46-42.83-46S276,132.59,276,159.91c0,27,19.82,46,42.82,46S361.68,186.92,361.68,159.91Z"/>
                        <path d="M559.34,159.91c0,43.71-34.2,75.93-76.17,75.93S407,203.62,407,159.91c0-44,34.2-75.93,76.17-75.93S559.34,115.88,559.34,159.91Zm-33.34,0c0-27.32-19.82-46-42.83-46s-42.82,18.69-42.82,46c0,27,19.82,46,42.82,46S526,186.92,526,159.91Z"/>
                        <path d="M716.82,88.56V224.88c0,56.08-33.07,79-72.17,79-36.8,0-58.95-24.62-67.3-44.75l29-12.08c5.17,12.36,17.84,26.94,38.24,26.94,25,0,40.53-15.44,40.53-44.5V218.55H684c-7.46,9.21-21.84,17.25-40,17.25-38,0-72.74-33.07-72.74-75.62C571.26,117.32,606,84,644,84c18.11,0,32.49,8,40,17h1.16V88.6h31.67Zm-29.31,71.62c0-26.74-17.83-46.28-40.53-46.28-23,0-42.28,19.54-42.28,46.28,0,26.46,19.28,45.74,42.28,45.74C669.68,205.92,687.51,186.64,687.51,160.18Z"/>
                        <path d="M769,8.66V231.18H736.5V8.66Z"/>
                        <path d="M895.76,184.9l25.88,17.25c-8.35,12.36-28.48,33.65-63.26,33.65-43.14,0-75.35-33.34-75.35-75.93,0-45.15,32.48-75.93,71.61-75.93,39.41,0,58.68,31.36,65,48.3l3.46,8.63-101.51,42c7.78,15.23,19.86,23,36.81,23s28.75-8.36,37.38-21ZM816.1,157.58,884,129.4c-3.73-9.48-15-16.09-28.18-16.09C838.83,113.31,815.24,128.27,816.1,157.58Z"/>
                        <path d="M119.58,140.15V107.94H228.13a106.75,106.75,0,0,1,1.61,19.44c0,24.17-6.6,54.06-27.9,75.35-20.71,21.57-47.17,33.07-82.23,33.07C54.64,235.8,0,182.88,0,117.9S54.64,0,119.61,0c36,0,61.55,14.1,80.79,32.49L177.67,55.22c-13.79-12.94-32.48-23-58.09-23C72.13,32.21,35,70.45,35,117.9s37.11,85.69,84.56,85.69c30.77,0,48.3-12.36,59.53-23.59,9.11-9.11,15.1-22.11,17.46-39.88Z"/>
                        </g>
                    </g>
                </svg>
            </div>
            <div class="col-6 col-md-2 p-4">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2498.82 1040">
                    <g id="Layer_2" data-name="Layer 2">
                      <g id="Layer_1-2" data-name="Layer 1">
                        <path class="cls-1" d="M418,843c-20-6.86-33.67-16.17-50.36-34.26-35.06-38-37-49.33-37-218,0-162.56,2.5-177.87,35.16-216,45.8-53.5,151.69-51.91,196.92,2.94,30,36.44,32.47,52.66,32.47,215.6,0,129-1.12,150.44-9,173-12.06,34.55-47.6,68-83.65,78.68-34,10.1-50.75,9.73-84.57-1.89Zm62.17-78.2c20.42-7.83,22.69-25,22.69-171.12q0-139.87-5.64-152.15c-12.63-27.72-56-27.72-68.59,0Q423,453.87,423,593.63c0,163,2.09,172.51,38.28,173.83,6,.22,14.46-1,18.9-2.71Zm221.76,75.47c-7.19-3.91-17.3-15.62-22.46-26-8.71-17.53-9.5-35.46-10.88-247.27l-1.48-228.36h95.31v209c0,178.91,1.07,209.93,7.42,215.2,11.06,9.18,29,2.46,49.35-18.46l18.1-18.63V338.58h94.84V842.73H837.29V792l-23.71,21c-13,11.57-30.93,24.12-39.77,27.87C753.22,849.64,718.69,849.32,701.93,840.22Zm-578.49-136-.08-138.52L61.68,368.52,0,171.36l50.12-1.44c29.33-.83,51.37.62,53.16,3.52,1.68,2.72,17.59,60.07,35.35,127.45s33.43,122.51,34.83,122.52S187.94,378,202.55,322.35s29.91-112.87,34-127.28L244,168.86H296.6c42.85,0,52.1,1.29,49.93,6.94-1.46,3.81-29.79,93.57-62.93,199.45L223.34,567.76v275H123.51l-.07-138.51Z"/>
                        <path d="M1422,1037.16c-243.86-8.14-309.89-25.5-354.79-93.28-18.14-27.39-38.5-88.67-45-135.42-22.76-164.05-17.17-506.14,10.19-624,24.78-106.78,83-159.09,189.33-170C1326.12,3.73,1598.31-2.1,1863.06.7c285.82,3,420.39,9.13,469.08,21.31,95.24,23.82,141.44,94,157.55,239.2,3,27.45,6.79,123.3,8.31,213,6.16,362.07-21.08,477.25-124.89,528.11-39.19,19.2-64.84,23.62-175.62,30.23-120.33,7.18-611.37,10.11-775.54,4.63Zm120-197.35c8.42-4.36,25.15-17,37.19-28.1L1601,791.54v51.19h94.84V343.57H1601V724.25L1579.2,746c-23.4,23.41-32.87,26.33-45.23,14-6.87-6.88-7.84-33.07-7.84-212.14V343.57h-94.84V559.8c0,238.53,2,257.4,28.79,277.43C1477.07,849.9,1519.8,851.25,1541.92,839.81Zm456.48-1.61c8.71-5.31,20.78-20.12,27.45-33.67,11.71-23.78,12-27.06,13.59-188.82,1.8-177.36-1.06-209.39-21.89-245.34-11.58-20-39.18-36.79-60.42-36.79-20.46,0-49.77,13.76-72.12,33.86l-24.44,22V173.85h-89.85V842.72h89.85V796.64l20.49,18.51c11.27,10.18,27.56,21.59,36.19,25.34,23.17,10.09,62.67,9,81.15-2.3Zm-119.12-81.42-18.72-10.85V439.79L1882.71,428c18-9.53,24.8-10.81,36.19-6.82,24.62,8.65,27.27,27.72,25.56,183.59l-1.54,139-14,12c-17.15,14.74-25.58,14.91-49.64,1Zm420.54,80.54c48.24-21.87,70-58.85,73.76-125.58l2.49-43.72h-96.22v29.63c0,36.29-5.63,52.14-22.4,63.14-18.9,12.37-42.4,4.51-53.71-18-6.83-13.58-8.73-30.13-8.73-76l0-58.65h179.7V534.83c0-92.25-7.22-121.65-38.32-156.24-27.48-30.56-56.93-42.73-101.45-41.91-36.9.67-61.56,9.87-87.46,32.61-42.33,37.17-48.75,70.29-46.22,238.83,1.65,109.51,3.46,136.19,10.57,155,12.14,32.15,34.07,56.64,64.18,71.64,34,16.91,89.6,18,123.83,2.53ZM2195,495.64c0-62.08,15.92-83.27,56-74.46,20.12,4.42,28.85,26.94,28.85,74.47v37.6H2195v-37.6Zm-858.55,60.07v-287h109.81V173.86H1131.79V268.7h104.83v574h99.83Z"/>
                      </g>
                    </g>
                  </svg>                  
            </div>
            <div class="col-12 col-md-3 p-4">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 294.49 40.16">
                    <defs>
                      <style>
                        .cls-newyourk {
                          fill: none;
                        }
                  
                        .cls-2 {
                          clip-path: url('#clip-path');
                        }
                  
                      </style>
                      <clipPath id="clip-path" transform="translate(-0.55 0)">
                        <polygon class="cls-newyourk" points="294.49 0 295.04 40 0.55 40 0 0 294.49 0"/>
                      </clipPath>
                    </defs>
                    <g id="Layer_2" data-name="Layer 2">
                      <g id="Layer_1-2" data-name="Layer 1">
                        <g>
                          <g class="cls-2">
                            <path class="cls-3" d="M9.21,22.2V11.42L5.67,12.83A9.91,9.91,0,0,0,5,17.32,10.69,10.69,0,0,0,7.24,23ZM18.74,0a6.18,6.18,0,0,1,3.07,1.26,3.91,3.91,0,0,1,1,3.78,4.08,4.08,0,0,1-2,2.68,5.13,5.13,0,0,1-2.21.94v5.2L21,15.75,18.58,18V25a15.21,15.21,0,0,0,3.62-4.88s.08-.16.24-.55a8.8,8.8,0,0,1-.94,4.88,9,9,0,0,1-3.94,4.25,11,11,0,0,1-7.87,1.34A10.84,10.84,0,0,1,2.36,25.2,12,12,0,0,1,.55,18.58c.08-4.8,3.78-8.89,8-10.47A6,6,0,0,1,10,7.72c-.31.23-.71.47-1.18.78a9.29,9.29,0,0,0-3.07,3.94L13.94,8.9V20L7.4,23.23a8.9,8.9,0,0,0,5,2.75A9.56,9.56,0,0,0,18,25.12V17.87l-2.44-2.12L18,13.86V8.66a37.83,37.83,0,0,1-4.33-1C12.13,7.32,7.24,6,6.46,5.83a3.19,3.19,0,0,0-2.29.39,2.29,2.29,0,0,0-.71,2.21,2.4,2.4,0,0,0,.71.94,1.59,1.59,0,0,1-.78-.31A3.57,3.57,0,0,1,1.65,6.14,4.89,4.89,0,0,1,3.7,1.89,6.24,6.24,0,0,1,8,.87c2.44.31,5.67,1.65,8.58,2.36a4.13,4.13,0,0,0,2.76-.08,1.28,1.28,0,0,0,.47-1.81C19.21.31,18,.31,17,.16A7.57,7.57,0,0,1,18.74,0" transform="translate(-0.55 0)"/>
                          </g>
                          <g class="cls-2">
                            <path class="cls-3" d="M50.79,19.37,47,22.05V13.23Zm-.16-8.5-4.17,2.44-3.94,2V25.59L41,26.77l.24.24,1.5-1.18,4.64,4,8-6.14-.15-.24-4.49,3.39L47,23.62V22.36l7.32-5.19Z" transform="translate(-0.55 0)"/>
                          </g>
                          <g class="cls-2">
                            <path class="cls-3" d="M29.53,33.86a7.87,7.87,0,0,0,5.19-.71c2.52-1.18,3.47-3.78,3.47-6.38l.08-3.7V14.88l1.57-1.18-.15-.24-1.58,1.19-3.39-3.94-5.19,3.86V1.5L24.25,5.83c.24.15,1.42.31,1.42,1.41V25.59l-2.76,1.73.16.24,1.18-.87,3.31,3,5.2-4-.16-.24-1.26.95L29.61,25.2V15l2-1.26,2.84,2.91v8.82c0,2.37-.63,5.12-1.89,6.54a4.89,4.89,0,0,1-3.07,1.89" transform="translate(-0.55 0)"/>
                          </g>
                          <g class="cls-2">
                            <path class="cls-3" d="M65.59,32.91c-2.05-.23-2.91-1.41-2.91-2.44a2.21,2.21,0,0,1,1.89-2,4.15,4.15,0,0,1,3.62,1.66L73,25l-.23-.24L71.5,26.22a7.91,7.91,0,0,0-4.81-2.6V8l12.21,22a1.48,1.48,0,0,0,.86.24c.48,0,.32-.32.32-.32V7.72a4.93,4.93,0,0,0,3.15-1.34A4.57,4.57,0,0,0,84.41,1.1a2.57,2.57,0,0,1-2.52,2.29A4.37,4.37,0,0,1,78.74,2l-5,5.35.24.24,1.33-1.5A5.36,5.36,0,0,0,79.21,7.8V20.63l-8.9-16.3a4.78,4.78,0,0,0-4.09-2.52,4.4,4.4,0,0,0-4.17,3.62,5.1,5.1,0,0,0,0,2.37s.31-2.13,1.65-2.13c1.18,0,1.58.63,2.13,1.42v5.19c-1.26.08-4.26.24-4.49,3.55a3.65,3.65,0,0,0,1.49,2.91,3.26,3.26,0,0,0,1.58.55,1.46,1.46,0,0,1-.71-1.65c.32-.95,2.13-1.1,2.21-.71v6.61c-1,0-3.94.08-5.44,2.76a4.48,4.48,0,0,0,.08,4.64,4.81,4.81,0,0,0,5,2" transform="translate(-0.55 0)"/>
                          </g>
                          <g class="cls-2">
                            <path class="cls-3" d="M92.05,19.37,88,22.05V13.23Zm-.16-8.5-4.25,2.44-3.7,2V25.59l-1.5,1.18.24.24,1.49-1.18,4.33,4,8-6.14-.16-.24-4.49,3.39-3.62-3.31V22.28l7.32-5.19Z" transform="translate(-0.55 0)"/>
                          </g>
                          <g class="cls-2">
                            <path class="cls-3" d="M103.23,30.08l-3.94-3.15-1.73,1.18-.16-.24,1.73-1.26V17.72c.08-3.63-3.46-2.76-3.22-6.62.07-1.73,1.81-3,2.67-3.38a4.66,4.66,0,0,1,1.89-.48s-1.65.95-1.26,2.37c.63,2.2,4.41,2.36,4.49,5.27V25l2.44,2.21.71-.56V15.67l-1.1-1.5,3.94-3.38,3.62,3.07-1.66,1.42V25l3.63,2.68.63-.4V15.67l-1.5-1.42,3.94-3.46,3.7,2.91,1.49-1.26.16.24-3.31,2.83V25L112,30l-4.33-3.23Z" transform="translate(-0.55 0)"/>
                          </g>
                          <g>
                            <g class="cls-2">
                              <path class="cls-3" d="M276.38,19.37l-4.18,2.68V13.23Zm-.08-8.5-4.25,2.44-3.86,2V25.59l-1.65,1.18.23.24,1.5-1.18,4.64,4,8-6.14-.16-.24-4.49,3.39-3.7-3.31V22.28l7.32-5.19Z" transform="translate(-0.55 0)"/>
                            </g>
                            <path class="cls-3" d="M248.58,14.72l.87-.7,2.28,2.83v8.43l-.71.94,3.31,3.54,3.54-3.38L256.46,25V14.8l1-.78,2.91,2.75V25.2l-1.18.78,3.7,3.86,4.89-4.33-.24-.23-1.18,1-2.05-1.89V14.8l2-1.34-.16-.23-1.81,1.34L261,10.94l-4.72,3.63-3.39-3.47-4.56,3.47L245,11.1l-4.88,4.1.16.23,1.57-1.26L244,16.61v8.51l-1.11.94,3.55,3.86,3.62-3.46-1.5-1.5Zm-6.85,11.11-.16-.24-1.41,1.18-1.89-2.12V15.12l1.65-1.34-.23-.24-1.58,1.34L234.72,11l-5,3.94.63.16,1.25-1,2.05,2.29v9.68l-1.42,1.18.16.24,1.5-1.26,3.23,3.62ZM235,3.78l2.84,3.07-3.55,3.07-2.83-3Z" transform="translate(-0.55 0)"/>
                          </g>
                          <g class="cls-2">
                            <path class="cls-3" d="M215.67,22.2V11.42l-3.31,1.41a10.07,10.07,0,0,0-.71,4.49A10.62,10.62,0,0,0,213.94,23ZM225.12,0a6,6,0,0,1,3.07,1.26A3.88,3.88,0,0,1,229.13,5a4,4,0,0,1-2,2.68A3.75,3.75,0,0,1,225,8.5v5.2l2.36,2.05L225,17.8v7a13.56,13.56,0,0,0,3.62-4.64s.08-.16.24-.55a8.75,8.75,0,0,1-.95,4.88,8.88,8.88,0,0,1-3.93,4.25,11,11,0,0,1-7.88,1.34,10.84,10.84,0,0,1-7.32-4.88,12,12,0,0,1-1.81-6.62c.08-4.8,3.78-8.89,8-10.47a5.11,5.11,0,0,1,1.42-.39c-.32.23-.71.47-1.18.78a9.29,9.29,0,0,0-3.07,3.94l8.11-3.38v11.1l-6.46,3.07a8.9,8.9,0,0,0,5,2.75,8.52,8.52,0,0,0,5.43-1V17.72l-2.36-2,2.36-2.05V8.43A39.42,39.42,0,0,1,220,7.56c-1.5-.32-6.38-1.65-7.17-1.81a3.17,3.17,0,0,0-2.28.39,2.29,2.29,0,0,0-.71,2.21,2.32,2.32,0,0,0,.71.94,1.64,1.64,0,0,1-.79-.31A3.57,3.57,0,0,1,208,6.06a4.89,4.89,0,0,1,2.05-4.25,6.24,6.24,0,0,1,4.33-1c2.44.31,5.67,1.65,8.58,2.36a4.08,4.08,0,0,0,2.76-.08,1.27,1.27,0,0,0,.47-1.81c-.63-1-1.81-1-2.83-1.18A14.29,14.29,0,0,1,225.12,0" transform="translate(-0.55 0)"/>
                          </g>
                          <g class="cls-2">
                            <path class="cls-3" d="M286.38,12.91V18l2.2,1.5s3.78-3,5.2-5.67c0,0-1.73,2.28-4,1.57A5.17,5.17,0,0,1,286.85,13m-4.33,13.39a4.67,4.67,0,0,1,4.57-2.13,6.27,6.27,0,0,1,4,3.39V21.18l-2.28-1.57c-2.05,2-5.83,5-6.3,6.77m2.76,4.88a3.42,3.42,0,0,1-3.39-2.76c-.55-2.28,1.1-3.78,3.54-6.22l-2.91-2.59V14.8s2.13-1,3.78-2l3.39-2.13a3.92,3.92,0,0,0,2.67,1.42c2.21-.16,2.13-1.89,2.05-2.29.39.63,1.42,2.6-2.52,6.93L295,19.13v6.38a61.74,61.74,0,0,0-7.17,4.33s-2-2.36-3.62-1.26c-1.1.87-.55,2.13,1,2.68" transform="translate(-0.55 0)"/>
                          </g>
                          <g class="cls-2">
                            <path class="cls-3" d="M158,24l4.1,3.54V16.69L158,13.07Zm8.74-8.9,1.42-1.26.24.23-1.74,1.26V25.51l-4.09,2.36-3.78,2.21L154,26.14l-1.26,1.1-.24-.23,1.65-1.1v-11h-.23l4.17-2.05,3.62-2Z" transform="translate(-0.55 0)"/>
                          </g>
                          <g class="cls-2">
                            <path class="cls-3" d="M176.3,14.09,179.37,11a2.65,2.65,0,0,0,.79.55,2.25,2.25,0,0,0,2,.08,2.9,2.9,0,0,0,1-.78,4.9,4.9,0,0,1-2.52,4.72c-.63.32-2.68.79-4.57-1.34v11l2.29,1.65L180,25.59l.16.24-5,4.09-3.86-3.38-1.42,1.26-.23-.24,1.73-1.81V16.38l-1.26-2-1.42,1.18-.23-.23L173.31,11Z" transform="translate(-0.55 0)"/>
                          </g>
                          <g class="cls-2">
                            <path class="cls-3" d="M189.21,18.66l5.67-7.95a4.56,4.56,0,0,0,2.05,1.18c1.73.47,3.31-1.18,3.31-1.18-.32,2.12-1.42,4.57-3.7,5a5.83,5.83,0,0,1-3.94-1.18l-.4.55,7.88,11.5,1.57-1.34.24.23L196.46,30Z" transform="translate(-0.55 0)"/>
                          </g>
                          <g class="cls-2">
                            <path class="cls-3" d="M184.8,8c0-1.73-1-2.75-2-2.67l5.91-4.18V24.88l1.89,1.66,1.26-1,.24.24-5,4.17-3.39-3.07L182.44,28l-.24-.23,2.68-2V8Z" transform="translate(-0.55 0)"/>
                          </g>
                          <g class="cls-2">
                            <path class="cls-3" d="M144.8,14.65a2.58,2.58,0,0,1-1.73.78,1.85,1.85,0,0,1-1.57-.78v3.22a1.85,1.85,0,0,1,1.57-.78,2.43,2.43,0,0,1,1.73.71Zm-.15-6.93-2-2-1.18.87v7.63a2.52,2.52,0,0,0,1.81.87,1.31,1.31,0,0,0,1.34-.87ZM141.5,29.29a3.07,3.07,0,0,0,2.52-.47,1.91,1.91,0,0,0,.63-2.21V18.43a1.43,1.43,0,0,0-1.34-.87,2.52,2.52,0,0,0-1.81.87ZM132.83,7.56c0-1.58-.7-2.52-1.73-2.52-1.57,0-2,2.13-2,2.13A3.75,3.75,0,0,1,130.32,4,4.56,4.56,0,0,1,135,2.52a4,4,0,0,1,3.39,4V28.66a12.75,12.75,0,0,0,1.26.24,8.73,8.73,0,0,1,1.1.31V2.6h.79V6.22l4.8-3.86,3.62,3.15,1.73-1.42.16.24-1.73,1.5V26.38c-.08,1.34-.32,2.68-1.65,3.46-2.92,1.66-6.46-.23-9.61-.71-2.36-.31-6-.78-6.93,1.34a1.85,1.85,0,0,0,.79,2.44c2.12,1.34,11.57-2.28,14.8-.86,2.91,1.34,2.91,3.46,2.52,4.88-.79,2.68-4.33,3.23-4.33,3.23a2.43,2.43,0,0,0,1.26-2.6c-.24-.79-.79-1-2.68-.87-4,.48-8.9,2.37-12.12,1A5,5,0,0,1,129.37,33c.08-2.83,3.54-4,3.54-4V18.35c-.08-.4-1.89-.32-2.36.47-.63,1.18.79,1.73.79,1.73a2.5,2.5,0,0,1-2.05-.86,3.25,3.25,0,0,1-.16-4c1-1.42,2.29-1.65,3.86-1.81Z" transform="translate(-0.55 0)"/>
                          </g>
                        </g>
                      </g>
                    </g>
                  </svg>
                  
            </div>
            <div class="col-6 col-md-2 p-4">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1196.49 285.75">
                    <g id="Layer_2" data-name="Layer 2">
                      <g id="Layer_1-2" data-name="Layer 1">
                        <g>
                          <path d="M125,.35c-49,7.3-88.4,35.3-109.9,78.2-26.8,53.5-17.3,118.5,23.7,161.8,13.8,14.6,33.6,28.5,49,34.3l2.2.9v-38.3l8.8-36.3,8.8-36.3-2-8.2c-2.4-9.1-2.6-16.1-1-23.9,3.2-14.9,13.1-24.8,24.8-24.8,15.1,0,21.3,12.5,16.2,33-1.1,4.7-3.9,14.6-6.1,22-4.4,14.9-4.9,20.5-2.1,26.5,3.8,8.4,11.1,12,22.5,11.3,17.4-1.1,32.1-15.9,38.6-39,1.4-4.8,2.3-11.6,2.7-19.9,1-21.4-3.4-34.5-15.6-46.9-18.1-18.3-49.2-22.4-74.9-9.8-13.5,6.6-25.9,21.9-30.5,37.5s-2.2,34.1,6.4,47.4l3.1,4.9-2.2,9.3c-1.3,5-2.7,9.7-3.2,10.4-1.6,2-6.4-.5-12.9-6.5-12.3-11.3-19.9-30.2-19.9-49.4-.1-42.5,29.4-76.8,72.7-84.3,10.9-1.9,32.1-1.9,41-.1,45.5,9.6,73.3,46.8,68.4,91.7-2.7,25.5-11.7,44.9-27.6,59.7-23,21.5-55.9,25-74.3,7.8l-4.8-4.5-4.3,16.6c-5.5,21.5-8.8,30.5-16,43.3l-5.9,10.5,6.1,1.8c7.8,2.2,26.7,4.7,35.5,4.7,24.8,0,51.7-7.4,72.7-19.9,35.8-21.3,59.3-54.5,68.2-96.1,2.6-12.1,2.5-43-.1-55-6.4-29.6-18.6-52.2-39.5-73.1-20.8-20.7-43.3-33-72.1-39.4C164.19.65,132-.65,125,.35Z"/>
                          <path d="M485,47.65c-7.5,1.9-12.1,5.9-15.4,13.1-5.9,12.9,2.2,28.3,16.2,30.9,9.6,1.7,19.8-3,24.1-11.3,2.6-5.2,3.3-14.1,1.4-18.6C506.89,51.35,495.09,45.05,485,47.65Z"/>
                          <path d="M338.49,137.75v83h38v-56h20.8c23.5,0,31.4-1.3,42.2-7.1,11.5-6.1,21.2-19.3,24.5-33.1,3.1-13.2.9-30.7-5.2-42.1-4.4-8.1-13.6-16.8-22.3-21-12.6-6.2-17.3-6.7-60.1-6.7h-37.9Zm79.3-46.1c6.7,3.2,9.8,8.2,10.4,16.6s-1.4,14.2-6.8,18.9-10.3,5.6-28.8,5.6h-16.1V88.55l18.3.4C411.59,89.25,413.39,89.45,417.79,91.65Z"/>
                          <path d="M644.49,82.75v19h-12v23h11.8l.4,36.7c.4,35.3.5,37,2.7,42.5a28,28,0,0,0,15.9,15.4c5,1.8,28.8,3.2,33.7,2l2.5-.6v-28H695a24.79,24.79,0,0,1-8-1.4c-5.2-2.2-5.6-5-5.3-37.6l.3-28.5,8.8-.3,8.7-.3v-22.9h-18v-38h-37Z"/>
                          <path d="M1140.49,82.75v19h-11v23h11v33.9c0,41.9.7,46.5,8.7,54.5,5.6,5.5,12.7,7.8,26.5,8.4a154.55,154.55,0,0,0,16.2-.2l4.6-.7v-27.9H1191c-6.6,0-11.2-2.1-12.5-5.6-.6-1.4-1-15.8-1-32.5v-29.9h19v-23h-19v-38h-37Z"/>
                          <path d="M583.09,98.85c-9,1.3-16,5-23.2,12.4l-6.4,6.5v-16h-36v119h36.9l.3-36.8.3-36.7,2.8-5.8c4.2-8.4,8.8-11.2,18.2-11.2,6.2,0,7.6.3,10.7,2.7,7.2,5.5,7.3,5.7,7.6,49l.3,38.8h38l-.4-43.8c-.3-35.2-.7-44.7-1.9-48.7C623.69,106.55,606.09,95.55,583.09,98.85Z"/>
                          <path d="M750.69,98.85a57.25,57.25,0,0,0-36.4,18.8c-10.4,11.2-15.7,26-15.8,43.7,0,30.8,18.6,55,47.2,61,9.9,2.1,29,1.4,36.8-1.4,17.9-6.3,31.2-19.1,35.5-34l.6-2.2h-35.8l-3.3,4.1c-4.4,5.5-9.8,7.9-18.1,7.9-11.6,0-19.7-5.8-24-17.1-3.7-9.8-7.8-8.9,40.8-8.9h42.6l-.6-9.3c-1.7-25.9-13.2-46.4-31.4-55.9A65.29,65.29,0,0,0,750.69,98.85Zm19.4,28.7a22.45,22.45,0,0,1,5.5,3.8,36,36,0,0,1,6.4,13.7l.7,3.7h-47.4l.7-3.3c2-9.2,8.9-17.5,16.3-19.6C757.39,124.45,765.49,125.25,770.09,127.55Z"/>
                          <path d="M949,98.75a60.49,60.49,0,0,0-32.6,14c-17.5,15-25,44.5-17.5,69.2,4.4,14.2,15.2,27.7,27.6,34.2,19.2,10.1,45.7,10.2,64.3.4,8-4.3,17.4-13.7,21.5-21.4,5.6-10.8,6.1-10.4-14.6-10.4h-17.9l-2.4,3.7c-6.4,10-24.6,11.4-34.8,2.6-4.3-3.6-7.5-9.4-8.9-16.1l-1-4.2h86.1l-.7-8.4c-2.6-31.9-17.3-53.4-41.5-61A71.41,71.41,0,0,0,949,98.75Zm14.8,27.1c7.5,2,14.9,11.2,15.9,19.4l.3,3-23.2.3-23.3.2v-2.3c0-4.4,5.9-14.6,10.1-17.4A24.12,24.12,0,0,1,963.79,125.85Z"/>
                          <path d="M1063.39,98.85c-20.4,2.1-35.4,12.1-39.9,26.7-2.4,7.7-2.5,12.8-.5,20.7,4,15.5,15.2,22.4,45,27.5,15.8,2.8,20.9,4.5,24,8.1,7.2,8.7-1,17.9-16,17.9-10.2,0-18.2-4.5-20.5-11.5l-1.2-3.5h-36l.7,3.2c3.9,17.8,16.9,29.7,37.5,34.3,10.8,2.4,30.1,2.2,40.2-.4,19.3-5,30.4-15.5,32.9-31.2,1.9-11.7-2.2-25.3-9.6-31.7-7.5-6.6-16.1-9.8-37.4-13.7-23-4.3-26.1-5.7-26.1-12.4s6.1-10.4,16.5-10.4c10.6,0,16.2,3.3,18.1,10.7l.6,2.6h34.9l-.7-3.8c-1-6.1-5.9-15.4-10.4-19.9C1105.09,101.75,1085.09,96.65,1063.39,98.85Z"/>
                          <path d="M883.79,101.65a33.62,33.62,0,0,0-17.2,12.8c-2,2.9-3.9,5.2-4.3,5.3s-.8-4.1-.8-9v-9h-36v119h38v-30.9c0-28.5.2-31.4,2.1-37.6,3.8-12.3,14-19.5,27.5-19.5h5.4v-33h-4.7A40.91,40.91,0,0,0,883.79,101.65Z"/>
                          <path d="M471.49,161.25v59.5h37v-119h-37Z"/>
                        </g>
                      </g>
                    </g>
                  </svg>
            </div>
            <div class="col-6 col-md-2 p-4">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496.4 125.6">
                    <g id="Layer_2" data-name="Layer 2">
                      <g id="Layer_1-2" data-name="Layer 1">
                        <g>
                          <g>
                            <path d="M158.8,98.9,165,84.5c6.7,5,15.6,7.6,24.4,7.6,6.5,0,10.6-2.5,10.6-6.3-.1-10.6-38.9-2.3-39.2-28.9C160.7,43.4,172.7,33,189.7,33c10.1,0,20.2,2.5,27.4,8.2l-5.8,14.7c-6.6-4.2-14.8-7.2-22.6-7.2-5.3,0-8.8,2.5-8.8,5.7.1,10.4,39.2,4.7,39.6,30.1,0,13.8-11.7,23.5-28.5,23.5-12.3,0-23.6-2.9-32.2-9.1"/>
                            <path d="M396.7,79.3a17.9,17.9,0,1,1,0-17.6l17.1-9.5a37.5,37.5,0,1,0,0,36.6Z"/>
                            <rect x="228.1" y="1.9" width="21.4" height="104.7"/>
                            <polygon points="422.2 1.9 422.2 106.6 443.6 106.6 443.6 75.2 469 106.6 496.4 106.6 464.1 69.3 494 34.5 467.8 34.5 443.6 63.4 443.6 1.9 422.2 1.9"/>
                            <path d="M313.1,79.5c-3.1,5.1-9.5,8.9-16.7,8.9a17.9,17.9,0,1,1,0-35.8,19.74,19.74,0,0,1,16.7,9.2Zm0-45V43c-3.5-5.9-12.2-10-21.3-10-18.8,0-33.6,16.6-33.6,37.4S273,108,291.8,108c9.1,0,17.8-4.1,21.3-10v8.5h21.4v-72Z"/>
                          </g>
                          <g>
                            <g>
                              <path d="M26.5,79.4A13.2,13.2,0,1,1,13.3,66.2H26.5Z"/>
                              <path d="M33.1,79.4a13.2,13.2,0,0,1,26.4,0v33a13.2,13.2,0,0,1-26.4,0Z"/>
                            </g>
                            <g>
                              <path d="M46.3,26.4A13.2,13.2,0,1,1,59.5,13.2V26.4Z"/>
                              <path d="M46.3,33.1a13.2,13.2,0,1,1,0,26.4H13.2a13.2,13.2,0,0,1,0-26.4Z"/>
                            </g>
                            <g>
                              <path d="M99.2,46.3a13.2,13.2,0,1,1,13.2,13.2H99.2Z"/>
                              <path d="M92.6,46.3a13.2,13.2,0,1,1-26.4,0V13.2a13.2,13.2,0,1,1,26.4,0Z"/>
                            </g>
                            <g>
                              <path d="M79.4,99.2a13.2,13.2,0,1,1-13.2,13.2V99.2Z"/>
                              <path d="M79.4,92.6a13.2,13.2,0,0,1,0-26.4h33.1a13.2,13.2,0,1,1,0,26.4Z"/>
                            </g>
                          </g>
                        </g>
                      </g>
                    </g>
                </svg>                  
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg-main-color">
    <div class="container py-5">
        <div class="row">
            <div class="col-12 col-lg-6 text-white pe-xl-5 py-lg-5">
                <p class="h1 lh-sm">
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
                <div class="pe-xl-5">
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