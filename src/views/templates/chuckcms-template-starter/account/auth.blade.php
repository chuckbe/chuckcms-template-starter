@extends($template->hintpath.'::templates.' . $template->slug . '.layouts.base')

@section('title')
{{ ChuckSite::getSite('name') }} | Login
@endsection

@section('meta')
<meta http-equiv="x-ua-compatible" content="ie=edge">
@php 
	$lang = \LaravelLocalization::getCurrentLocale();
@endphp
<meta name="robots" content="noindex,nofollow">
<meta name="googlebots" content="noindex,nofollow">
<meta name="google" content="notranslate">
@if( ChuckSite::getSetting('integration.g-site-verification') !== null )
<meta name="google-site-verification" content="{{ ChuckSite::getSetting('integration.g-site-verification') }}">
@endif
<meta name="generator" content="ChuckCMS">
@if(ChuckSite::getSite('name') !== null)
<meta property="og:site_name" content="{{ ChuckSite::getSite('name') }}">
@endif
<meta property="og:locale" content="{{ $lang }}">
@endsection

@section('css')
{{-- <style>
.bd-placeholder-img {
  font-size: 1.125rem;
  text-anchor: middle;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

@media (min-width: 768px) {
  .bd-placeholder-img-lg {
    font-size: 3.5rem;
  }
}

html,
body {
  height: 100%;
}

body {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style> --}}
<style>
  .form-signin .form-group .form-control:hover, .form-signin .form-group .form-control:focus{
    border-color: var(--main-color) !important;
    box-shadow: none;
  }
  .social-logins a:hover{
    color: var(--main-color) !important;
  }
</style>
@endsection

@section('scripts')

@endsection

@section('content')
<div class="container">
  <div class="row py-5 flex-column-reverse flex-lg-row">
    <div class="col-12 col-lg-6 ps-xl-5 pt-5 pt-lg-0">
        <p class="h1 lh-base">
            Hier kan je inloggen in je account of registeren
        </p>
        <div class="">
          <form class="form-signin" id="form-login" role="form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="form-group py-3">
                <label for="email" class="d-block text-color-main small">Email*</label>
                <input type="text" id="inputEmail" class="form-control border-0 rounded-0 border-bottom border-2 border-dark" name="email" placeholder="test@email.be" required autofocus>
            </div>
            <div class="form-group py-3">
                <label for="password" class="d-block text-color-main small">Wachtwoord*</label>
                <input type="password" id="inputPassword" class="form-control border-0 rounded-0 border-bottom border-2 border-dark" name="password" placeholder="Uw wachtwoord" required>
            </div>
            <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="1" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
            </label>
            </div>
            <div class="form-group">
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            </div>
            {{--  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>  --}}
            
            <div class="row">
                <div class="col text-end mt-2">
                  <button class="btn chuck-btn bg-main-color text-white px-4 rounded d-flex flex-row" type="submit"><span class="btn-text">Button #1</span><span class="after">&gt;</span></button>
                </div>
                <div class="col-7 text-end mt-2 d-flex">
                    <a href="{{ URL::to('password/reset') }}" class="text-color-main mt-auto ms-auto">Wachtwoord vergeten?</a>
                </div>
            </div>
            <div class="row">
              <div class="col">
                  <div class="py-5">
                    <p>
                      <span class="fw-600">Of</span>
                      <span class="px-3 social-logins">
                        <a class="h3 text-dark" href="#"><i class="fab fa-google"></i></a>
                        <a class="h3 mx-2 text-dark" href="#"><i class="fab fa-facebook"></i></a>
                        <a class="h3 text-dark" href="#"><i class="fab fa-linkedin-in"></i></a>
                      </span>
                    </p>
                    <p>
                      <span class="fw-600">Heb je nog geen account?</span> <a href="{{ URL::to('password/reset') }}" class="text-color-main mt-auto ms-auto">Register dan hier</a>
                    </p>
                  </div>
              </div>
          </div>
          </form>
        </div>
    </div>
    <div class="col-12 col-lg-6 d-flex">
        <div class="me-0 me-xl-5 ms-auto rounded overflow-hidden tile h-100 scale" style="background-image: url({{asset('chuckbe/chuckcms-template-starter/img/header.jpg')}}); background-position: bottom"></div>
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
@endsection