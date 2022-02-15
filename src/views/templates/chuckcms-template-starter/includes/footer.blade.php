<footer class="container">
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-none mt-3 mb-3 ps-0 pe-0">
                <a class="navbar-brand" href="{{ ChuckSite::getSite('domain') }}"><img src="{{ ChuckSite::getSite('domain') }}{{ ChuckSite::getSetting('logo.href') }}" alt="{{ config('app.name', 'Laravel') }}" height="60"></a>
                <div class="footernav font-weight-bold fw-bold ms-auto">
                    {!! ChuckMenu::renderFrontEnd('chuckcms-template-starter', 'menu-front-end', 'header') !!}
                </div>
                <div class="socials">
                    <ul class="list-unstyled list-inline social-icons d-flex mb-0 ms-3">
                        @if(ChuckSite::getSetting('socialmedia.instagram') !== null)
                        <li class="list-inline-item">
                            <a target="_blank" href="{{ ChuckSite::getSetting('socialmedia.instagram') }}"> <i class="fab fa-instagram text-color-main"></i> </a>
                        </li>
                        @endif
                        @if(ChuckSite::getSetting('socialmedia.facebook') !== null)
                        <li class="list-inline-item">
                            <a target="_blank" href="{{ ChuckSite::getSetting('socialmedia.facebook') }}"> <i class="fab fa-facebook-f text-color-main"></i> </a>
                        </li>
                        @endif
                        @if(ChuckSite::getSetting('socialmedia.pinterest') !== null)
                        <li class="list-inline-item">
                            <a target="_blank" href="{{ ChuckSite::getSetting('socialmedia.pinterest') }}"> <i class="fab fa-pinterest-p text-color-main"></i> </a>
                        </li>
                        @endif
                        @if(ChuckSite::getSetting('socialmedia.twitter') !== null)
                        <li class="list-inline-item">
                            <a target="_blank" href="{{ ChuckSite::getSetting('socialmedia.twitter') }}"> <i class="fab fa-twitter text-color-main"></i> </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <hr class="bg-main-color" style="opacity: 1; height: 2px;">
    <div class="row py-3">
            <div class="col-12 col-xl-6 d-flex">
                <ul class="list-unstyled list-inline d-flex flex-column flex-md-row mx-md-auto ms-xl-0">
                    <li class="py-2 ps-0"><a href="#" class="text-muted">Privacybeleid</a></li>
                    <li class="py-2 ps-0 ps-md-3"><a href="#" class="text-muted">Cookieverklaring</a></li>
                    <li class="py-2 ps-0 ps-md-3"><a href="#" class="text-muted">Algemene Voorwaarden</a></li>
                    <li class="py-2 ps-0 ps-md-3"><a href="#" class="text-muted">Disclaimer</a></li>
                </ul>
            </div>
            <div class="col-12 col-xl-6 d-flex py-2">
                <span class="text-muted ms-auto me-auto me-xl-0 text-center">
                    © Copyright{{ date('Y') }}
                    | 
                    All Rights Reserved 
                    | 
                    Powered by chuck.be
                </span>
            </div>
        </div>
</footer>