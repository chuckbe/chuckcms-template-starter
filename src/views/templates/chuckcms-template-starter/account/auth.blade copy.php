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
@endsection

@section('scripts')

@endsection

@section('content')
<div class="container" style="height:calc(100vh - 122px);min-height:375px;">
    <div class="row h-100 d-flex">
        <div class="col col-sm-6 col-md-4 col-lg-3 my-auto mx-auto">
        <h3 class="text-center mb-5">Login</h3>
            <form class="form-signin mb-5" id="form-login" role="form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="text" id="inputEmail" class="form-control" name="email" placeholder="Email address or username" required autofocus>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
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
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                <div class="row">
                    <div class="col text-right mt-2">
                        <a href="{{ URL::to('password/reset') }}" class="text-dark ml-auto"><small>Forgot password?</small></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    
@endsection