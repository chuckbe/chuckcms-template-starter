<div class="container mt-5">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-6 mb-5 mb-md-0">
            <ul class="list-unstyled">
                <li class="font-weight-bold"><h3>{{ ChuckTemplate::forTemplate('chuckcms-template-starter')->getSetting('footer_subscribe_title') }}</h3><li>
                <li><span class="font-weight-bold">{{ ChuckTemplate::forTemplate('chuckcms-template-starter')->getSetting('footer_subscribe_subtitle') }}</span> <br>{{ ChuckTemplate::forTemplate('chuckcms-template-starter')->getSetting('footer_subscribe_subsubtitle') }}</li>
            </ul>
            <form action="">
                <div class="row">
                    <div class="col border-bottom mb-2">
                        <input type="text" class="form-control-plaintext" placeholder="Naam & Voornaam">
                    </div>
                    <div class="col border-bottom mx-sm-3 mb-2">
                        <input type="email" class="form-control-plaintext" placeholder="E-mailadres">
                    </div>
                </div>
                <div class="w-100"></div>
                <div class="row">
                    <div class="col-8">
                        <div class="form-check pt-2">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                Ik ga akkoord met de privacy policy
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-dark mb-2 float-right rounded-0">Subscribe</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-6 col-sm-6 col-md-3">
            <ul class="list-unstyled">
                <li class="font-weight-bold">{{ ChuckTemplate::forTemplate('chuckcms-template-starter')->getSetting('footer_address_title') }}<li>
                <li>{{ ChuckSite::getSetting('company.street') }} {{ ChuckSite::getSetting('company.housenumber') }}</li>
                <li>{{ ChuckSite::getSetting('company.postalcode') }} {{ ChuckSite::getSetting('company.city') }}</li>
                <li class="mt-3 font-weight-bold">{{ ChuckTemplate::forTemplate('chuckcms-template-starter')->getSetting('footer_contact_title') }}</li>
                <li><a href="mailto:{{ ChuckSite::getSetting('company.email') }}" class="text-dark">{{ ChuckSite::getSetting('company.email') }}</a></li>
                <li><a href="tel:{{ ChuckSite::getSetting('company.tel') }}" class="text-dark">{{ ChuckSite::getSetting('company.tel') }}</a></li>
                <li class="mt-3">{{ ChuckSite::getSetting('company.vat') }}</li>
            </ul>
        </div>
        <div class="col-6 col-sm-6 col-md-3">
            <ul class="list-unstyled">
                <li class="font-weight-bold">{{ ChuckTemplate::forTemplate('chuckcms-template-starter')->getSetting('footer_hours_title') }}<li>
                @foreach( explode('|', ChuckTemplate::forTemplate('chuckcms-template-starter')->getSetting('footer_hours_hours') ) as $hour)
                <li>{{ $hour }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    <hr>
    <div class="row">
            <div class="col">
                <ul class="list-unstyled list-inline pull-left">
                    <li><a href="#" class="text-dark">Disclaimer</a></li>
                    <li><a href="#" class="text-dark">Cookie Policy</a></li>
                    <li><a href="#" class="text-dark">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="col">
                <p class="text-muted pull-right text-right">{{ ChuckSite::getSetting('company.name') }} © {{ date('Y') }} <br> powered by chuck.be</p>
            </div>
        </div>
</div>