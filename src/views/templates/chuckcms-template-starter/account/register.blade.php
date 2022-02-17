@extends($template->hintpath.'::templates.' . $template->slug . '.layouts.base')

@section('title')
    Register
@endsection

@section('meta')
<meta http-equiv="x-ua-compatible" content="ie=edge">
@php 
    $lang = \LaravelLocalization::getCurrentLocale();
@endphp

<meta property="og:locale" content="{{ $lang }}">
@endsection

@section('css')
<style>
    #RegisterMember .form-group:hover .form-control, #RegisterMember .form-group .form-control:focus{
      border-color: var(--main-color) !important;
      box-shadow: none;
    }
    #RegisterMember .form-group:hover label {
        color: var(--main-color) !important;
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
          <p class="h2 lh-base">
              Hier kan je inloggen in je account of registeren
          </p>
          <div class="">
            <form id="RegisterMember" method="POST" action="{{ route('register') }}">
              {{ csrf_field() }}
              <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} py-3">
                  <label for="email" class="d-block small">Email*</label>
                  <input class="form-control border-0 rounded-0 border-bottom border-2 border-dark" type="email" name="email" placeholder="test@email.be" value="{{ old('email') }}" required>
              </div>
              <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }} py-3">
                  <label for="password" class="d-block small">Wachtwoord*</label>
                  <input type="password" class="form-control border-0 rounded-0 border-bottom border-2 border-dark" id="password" name="password" placeholder="Uw wachtwoord">
              </div>
              <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }} py-3">
                <label for="password" class="d-block small">Wachtwoord*</label>
                <input type="password" class="form-control border-0 rounded-0 border-bottom border-2 border-dark" id="password-confirm" name="password_confirmation" placeholder="Uw Wachtwoord bevestigen">
              </div>
              <div class="checkbox mb-3">
              <label>
                  <input type="checkbox" value="1" name="remember"> Ik accepteer her <a href="#" class="text-color-main">privacybeleid</a>
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
              
              <div class="d-flex flex-row">
                  <div class="mt-2">
                    <button class="btn chuck-btn bg-main-color text-white px-4 rounded d-flex flex-row" type="submit"><span class="btn-text">Button #1</span><span class="after">&gt;</span></button>
                  </div>
                  <div class="d-flex ms-4 me-auto">
                    <div class="my-auto">
                        <span class="fw-600">Of</span>
                        <span class="px-3 social-logins">
                          <a class="h3 text-dark" href="#"><i class="fab fa-google"></i></a>
                          <a class="h3 mx-2 text-dark" href="#"><i class="fab fa-facebook"></i></a>
                          <a class="h3 text-dark" href="#"><i class="fab fa-linkedin-in"></i></a>
                        </span>
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
@endsection