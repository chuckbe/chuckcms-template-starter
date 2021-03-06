<div class="container-fluid bg-dark">
    <div class="container">
        <nav class="navbar py-0">
            <ul class="ml-auto mb-0">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                @if(URL::current() == ChuckSite::getSite('domain'))
                <li class="d-inline-block">
                    <a rel="alternate" class="nav-link py-0 pr-0 text-white text-uppercase" hreflang="{{ $localeCode }}" href="{{ $localeCode == config('lang.featuredLocale') ? ChuckSite::getSite('domain') : LaravelLocalization::localizeURL($localeCode, $localeCode) }}">{{ $localeCode }}</a>
                </li>
                @else
                @if(isset($page))
                <li class="d-inline-block">
                    <a rel="alternate" class="nav-link py-0 pr-0 text-white text-uppercase" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::localizeURL($page->translate('slug', $localeCode), $localeCode) }}">{{ $localeCode }}</a>
                </li>
                @else
                <li class="d-inline-block">
                    <a rel="alternate" class="nav-link py-0 pr-0 text-white text-uppercase" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::localizeURL(Request::path(), $localeCode) }}">{{ $localeCode }}</a>
                </li>
                @endif
                @endif
                @endforeach
            </ul>
        </nav>
    </div>
</div>

<div class="container bg-none">
    <nav class="navbar navbar-expand-lg navbar-light bg-none mt-3 mb-3 pl-0 pr-0">
      <a class="navbar-brand" href="{{ ChuckSite::getSite('domain') }}"><img src="{{ ChuckSite::getSite('domain') }}{{ ChuckSite::getSetting('logo.href') }}" alt="{{ config('app.name', 'Laravel') }}" height="40"></a>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="icon-bar top-bar"></span>
        <span class="icon-bar middle-bar"></span>
        <span class="icon-bar bottom-bar"></span>               
    </button>

      <div class="collapse navbar-collapse font-weight-bold" id="navbarSupportedContent">
        {!! ChuckMenu::renderFrontEnd('chuckcms-template-starter', 'menu-front-end', 'header') !!}
      </div>
    </nav>
</div>

{{-- 
<nav class="navbar navbar-default navbar-static-top" style="margin-bottom:0px!important">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>
            
            {!! ChuckMenu::renderFrontEnd('chuckcms-template-starter', 'menu-front-end', 'header') !!}

            
        </div>
    </div>
</nav> --}}