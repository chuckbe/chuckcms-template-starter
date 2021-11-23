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
<div class="container mb-5">
    <div class="row">
	    <div class="col-12">
	    	{{-- <h1 class="mt-5 d-inline-block pr-5 pb-2">Account</h1> --}}
            <h3 class="mt-2 mt-md-5 d-inline-block pr-lg-5 pb-5 underline-account position-relative" data-content="text">Mijn Account</h3>
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
</div>
	
@endsection