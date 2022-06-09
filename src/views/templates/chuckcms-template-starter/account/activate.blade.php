@extends($template->hintpath.'::templates.' . $template->slug . '.layouts.base')

@section('title')
Activeer uw account
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

@endsection

@section('content')
@if(!$activated)
<div class="container d-flex" style="min-height:550px;">
    <div class="m-auto">
    <div class="row">
        <div class="col-12 text-center">
            <h3 class="d-inline-block mb-4 underline-title position-relative" data-content="text">Maak een nieuw wachtwoord aan</h3> 
            <p>en bevestig uw account...</p>   
        </div>
    </div>

    <div class="login-popup-wrap mx-auto mt-4"> 
        @if(!is_null($user))
        <form id="RegisterMember" method="POST" action="{{ route('module.booker.activate.account.post') }}">
            {{ csrf_field() }}
            <div class="form-group">
                @if($errors->any())
                @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
                @endforeach
                @endif
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} mb-3 row">
                <div class="col-sm-12">
                <input class="form-control" type="email" name="email" placeholder="Emailadres" value="{{ old('email', $user->email) }}" disabled required>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} mb-3 row">
                <div class="col-sm-12">
                    <input type="password" class="form-control" id="password" placeholder="Wachtwoord" name="password">
                    <small>Gebruik kleine letters, hoofdletters, cijfers en speciale tekens.</small>
                </div>
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} mb-3 row">
                <div class="col-sm-12">
                    <input type="password" class="form-control" id="password-confirm" placeholder="Wachtwoord bevestigen" name="password_confirmation">
                </div>
            </div>
            <div class="form-group text-end">
                <input type="hidden" name="user_token" value="{{ $user->token }}">
                <button type="submit" class="d-block btn btn-dark me-auto text-end">Wachtwoord aanmaken</button>
            </div>
        </form>
        @endif
      
        <div class="text-center mt-5">Heb je al een account?<a class="hover-gg" href="{{ URL::to('/') }}/login"> Log hier in</a></div>

        {{-- <div class="login-popup-heading text-center">
            <img class="mx-auto d-flex mt-3" src="{{ URL::to('/') }}/img/panache_hat.png" width="80px" />                        
        </div> --}}
    </div>
    </div>
</div>
@else
<div class="container d-flex" style="min-height:550px;">
    <div class="m-auto">
    <div class="row">
        <div class="col-12 text-center">
            <h3 class="d-inline-block mb-4 underline-title position-relative" data-content="text">Uw account is geactiveerd</h3> 
            <p><a href="{{ route('login') }}" class="text-dark">Klik hier om u aan te melden</a></p>   
        </div>
    </div>
    </div>
</div>
@endif
@endsection