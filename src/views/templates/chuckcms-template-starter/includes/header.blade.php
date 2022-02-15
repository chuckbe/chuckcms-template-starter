{{-- <div class="container-fluid bg-dark">
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
</div> --}}

<div class="container bg-none">
    <nav class="navbar navbar-expand-lg navbar-light bg-none mt-3 mb-3 pl-0 pr-0">
      <a class="navbar-brand" href="{{ ChuckSite::getSite('domain') }}"><img src="{{ ChuckSite::getSite('domain') }}{{ ChuckSite::getSetting('logo.href') }}" alt="{{ config('app.name', 'Laravel') }}" height="40"></a>
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="icon-bar top-bar"></span>
        <span class="icon-bar middle-bar"></span>
        <span class="icon-bar bottom-bar"></span>               
        </button>

    @if(class_exists('\ChuckEcommerce'))
    <div class="dropdown my-4 ml-auto order-2 order-lg-4">
        <a class="m-2 shop-icon" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i></a>
        <div class="dropdown-menu dropdown-menu-account dropdown-menu-right" aria-labelledby="dropdownMenuLink">
            @if(Auth::check())
            <a class="dropdown-item" href="{{ route('module.ecommerce.account.index') }}">Account</a>
            <a class="dropdown-item" href="{{ route('module.ecommerce.account.order.index') }}">Bestellingen</a>
            <a class="dropdown-item" href="{{ route('module.ecommerce.account.address.index') }}">Adressen</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Uitloggen</a>
            @else
            <a class="dropdown-item" href="{{ route('login') }}">Aanmelden</a>
            <a class="dropdown-item" href="{{ route('register') }}">Account maken</a>
            @endif
        </div>
        @include($template->hintpath.'::templates.' . $template->slug . '.ecommerce._header_cart')
    </div>
    @endif

      <div class="collapse navbar-collapse font-weight-bold" id="navbarSupportedContent">
        {!! ChuckMenu::renderFrontEnd('chuckcms-template-starter', 'menu-front-end', 'header') !!}
      </div>
    </nav>
</div>

