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

@endsection

@section('scripts')

@endsection

@section('content')
<div class="container d-flex" style="min-height:550px;">
    <div class="m-auto">
    <div class="row">
        <div class="col-12 text-center">
            <h3 class="d-inline-block mb-4 underline-title position-relative" data-content="text">Maak een account aan</h3> 
            <p class="text-muted pb-1">Vul het onderstaand formulier in en maak een account aan.</p>
            {{-- <p class="text-muted">Ga naar <a href="{{ URL::to('/') }}/registreer-bedrijf" class="hover-pg">hier</a> voor het aanvragen van een bedrijfsacount.</p> --}}
        </div>
    </div>

    <div class="login-popup-wrap mx-auto mt-4"> 
                                <!--<form accept-charset="utf-8" method="post" action="">-->
        <form id="RegisterMember" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('surname') || $errors->has('name') ? ' has-error' : '' }} row">
                <div class="col-sm-6 pr-sm-1">
                <input class="form-control" type="text" name="surname" value="{{ old('surname') }}" placeholder="Voornaam" required autofocus>
                @if ($errors->has('surname'))
                    <span class="help-block">
                        <strong>{{ $errors->first('surname') }}</strong>
                    </span>
                @endif
                </div>
                <div class="col-sm-6 pl-sm-1 mt-3 mt-sm-0">
                <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Achternaam" required>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
             <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row">
                <div class="col-sm-12">
                <input class="form-control" type="email" name="email" placeholder="Emailadres" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} row">
                <div class="col-sm-12">
                <input type="password" class="form-control" id="password" placeholder="Wachtwoord" name="password">
                </div>
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} row">
                <div class="col-sm-12">
                <input type="password" class="form-control" id="password-confirm" placeholder="Wachtwoord bevestigen" name="password_confirmation">
                </div>
            </div>
            <button type="submit" class="btn btn-blue-t login-popup-btn mx-auto mt-4">Registreer</button>
        </form>

      
        <div class="text-center mt-3">Heb je al een account?<a class="hover-gg" href="{{ URL::to('/') }}/login"> Log hier in</a></div>

        {{-- <div class="login-popup-heading text-center">
            <img class="mx-auto d-flex mt-3" src="{{ URL::to('/') }}/img/panache_hat.png" width="80px" />                        
        </div> --}}
    </div>
    </div>
</div>
@endsection