@extends($template->hintpath.'::templates.' . $template->slug . '.layouts.base')

@section('title')
    Mijn Account 
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
    .headeroptions a:hover i{
        font-weight: 900;
    }
    .profile-image img{
        height: 200px;
        width: 200px;
        margin: auto;
        object-fit: cover;
        border-radius: 50%;
    }
    .profileupdate .form-group:hover label {
        color: var(--main-color) !important;
        font-weight: 600;
    }
    .profileupdate .form-control::placeholder{
        color: #868686 !important;
    }
    .profileupdate .form-group:hover .form-control, .profileupdate .form-group .form-control:focus{
      border-color: var(--main-color) !important;
      box-shadow: none;
    }
    .profileupdate .form-control:disabled{
        background-color: transparent;
    }
    .edit-image{
        height: 3rem;
        width: 3rem;
    }
</style>
@endsection

@section('scripts')
@if(session()->has('notification'))
<script>
$(document).ready(function() {
    popNotification('success', '{{ Auth::user()->name }}', '{{ session('notification') }}', 'icon-bell');
});
</script>
@endif
@endsection

@section('content')
<div class="container px-xl-5 py-3 py-md-5">
    <div class="row px-lg-5">
        <div class="col-12 d-flex flex-column flex-md-row">
            <h1 class="h2">Welkom terug {{ ucfirst(ChuckCustomer::get()->name) }}</h1>
            <div class="px-3 headeroptions">
                <a href="#" class="text-color-main h5 lh-lg pe-2"><i class="far fa-user"></i></a>
                <a href="#" class="text-color-main h5 lh-lg pe-2"><i class="far fa-box"></i></a>
                <a href="#" class="text-color-main h5 lh-lg pe-2"><i class="far fa-heart"></i></a>
                <a href="#" class="text-color-main h5 lh-lg pe-2"><i class="far fa-sign-out"></i></a>
            </div>
        </div>
        <div class="col-12 col-md-10 col-lg-9 col-xl-7 pe-lg-5">
            <p class="py-3 lh-base h5 pe-lg-3">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                sed do eiusmod tempor incididunt ut labore et dolore
            </p>
        </div>
    </div>
    <form class="row px-lg-5 profileupdate py-5" role="form" method="POST" action="{{ route('module.ecommerce.account.update') }}">
        @csrf
        <div class="col-12 col-md-4 col-lg-3">
            <div class="profile-image d-flex position-relative mx-5 mx-md-0 mb-5 mb-md-0">
                <img class="img-fluid" src="{{asset('chuckbe/chuckcms-template-starter/img/person.jpg')}}">
                <a href="#" class="edit-image bg-main-color text-white position-absolute d-flex justify-content-center align-items-center rounded-circle end-0 bottom-0 d-block me-5 me-md-0 me-xl-5 text-decoration-none h5"><i class="fas fa-pencil-alt"></i></a>
            </div>
        </div>
        <div class="col-12 col-md-8 col-lg-9">
            <div class="row gx-5 gy-4">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="account-fn" class="small">Voornaam</label>
                        <input class="form-control border-0 rounded-0 border-bottom border-2 border-dark px-0" type="text" id="account-fn" name="customer_name" value="{{ ChuckCustomer::get()->name }}" required>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="account-ln" class="small">Naam</label>
                        <input class="form-control border-0 rounded-0 border-bottom border-2 border-dark px-0" type="text" id="account-ln" name="customer_surname" value="{{ ChuckCustomer::get()->surname }}" required>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="account-email" class="small">Email</label>
                        <input class="form-control border-0 rounded-0 border-bottom border-2 border-dark px-0" type="email" id="account-email" name="customer_email" value="{{ \Auth::user()->email }}" disabled>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="account-phone" class="small">Telefoonnummer</label>
                        <input class="form-control border-0 rounded-0 border-bottom border-2 border-dark px-0" type="text" id="account-phone" name="customer_tel" value="{{ ChuckCustomer::get()->tel }}">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="account-phone" class="small">wachtwoord</label>
                        <input class="form-control border-0 rounded-0 border-bottom border-2 border-dark px-0" type="password" id="account-password" name="customer_password" value="123456789">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                        <button class="btn chuck-btn bg-main-color text-white px-4 rounded d-flex flex-row mt-2" type="submit"><span class="btn-text">Button #1</span><span class="after">></span></button>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="col-12">
                        <div class="alert alert-danger mt-5">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </form>
</div>

{{--  <div class="container mb-5 d-none">
    <div class="row">
	    <div class="col-12">
            
            <h3 class="mt-2 mt-md-5 d-inline-block pr-lg-5 pb-5 underline-account position-relative" data-content="text">Welkom terug Jonas</h3>
		</div>
	</div>
	
	@include($template->hintpath.'::templates.' . $template->slug . '.includes.nav-account')

	<div class="row mt-5">
		<div class="col-12">
            <h4>Gegevens</h4>
            <hr class="padding-bottom-1x">
			<form class="row" role="form" method="POST" action="{{ route('module.ecommerce.account.update') }}">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-fn">Voornaam</label>
                        <input class="form-control" type="text" id="account-fn" name="customer_surname" value="{{ ChuckCustomer::get()->surname }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-ln">Achternaam</label>
                        <input class="form-control" type="text" id="account-ln" name="customer_name" value="{{ ChuckCustomer::get()->name }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-email">E-Mailadres</label>
                        <input class="form-control" type="email" id="account-email" name="customer_email" value="{{ \Auth::user()->email }}" disabled>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-phone">Telefoon</label>
                        <input class="form-control" type="text" id="account-phone" name="customer_tel" value="{{ ChuckCustomer::get()->tel }}">
                    </div>
                </div>
                <div class="col-12">
                    <hr class="mt-2 mb-3">
                    @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                    @endif
                    
                    <div class="d-flex flex-wrap justify-content-between align-items-center">
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                        <button class="btn btn-blue-g mb-2 mt-2 rounded-0" type="submit">Opslaan</button>
                    </div>
                </div>
            </form>
		</div>
	</div>
</div>  --}}
	
@endsection