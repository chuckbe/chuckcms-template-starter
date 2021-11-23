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
<script>
$(document).ready(function() {
    $('body').on('change', '#ce_shippingEqualToBilling', function (event) {
        var shippingAddress = $('#ce_shippingAddress');

        if (this.checked) {
            shippingAddress.addClass('d-none');
            $('.shipping_address_input').prop('disabled', true);
            $('.shipping_address_input').prop('required', false);
        } else {
            shippingAddress.removeClass('d-none');
            $('.shipping_address_input').prop('disabled', false);
            $('.shipping_address_input').prop('required', true);
        }
    });
});
</script>

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
            <h3 class="mt-2 mt-md-5 d-inline-block pr-lg-5 pb-5 underline-account position-relative" data-content="text">Mijn Account</h3>
        </div>
    </div>
    
    @include($template->hintpath.'::templates.' . $template->slug . '.includes.nav-account')

    <div class="row mt-5">
        <div class="col-12">
            <h4>Facturatie Adres</h4>
            <hr class="padding-bottom-1x">
            <form role="form" method="POST" action="{{ route('module.ecommerce.account.address.update') }}">
            <div class="row">
                <div class="col-md-7 mb-3">
                    <label for="address">Straat *</label>
                    <input type="text" class="form-control" id="address" name="customer_street" placeholder="Straatnaam" value="{{ old('customer_street', ChuckCustomer::address()['street']) }}" required>
                    <div class="invalid-feedback">
                        Adres is een verplicht veld.
                    </div>
                </div>
                <div class="col-md-5 mb-3">
                    <label for="housenumber">Huisnummer *</label>
                    <input type="text" class="form-control" id="housenumber" name="customer_housenumber" placeholder="123" value="{{ old('customer_housenumber', ChuckCustomer::address()['housenumber']) }}" required>
                    <div class="invalid-feedback">
                        Huisnummer is een verplicht veld.
                    </div>
                </div>
            </div>

            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="postalcode">Postcode *</label>
                <input type="text" class="form-control" id="postalcode" name="customer_postalcode" placeholder="" value="{{ old('customer_postalcode', ChuckCustomer::address()['postalcode']) }}" required>
                <div class="invalid-feedback">
                  Postcode is een verplicht veld.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="city">Gemeente *</label>
                <input type="text" class="form-control" id="city" name="customer_city" placeholder="" value="{{ old('customer_city', ChuckCustomer::address()['city']) }}" required>
                <div class="invalid-feedback">
                  Gemeente is een verplicht veld.
                </div>
              </div>
              <div class="col-md-5 mb-3">
                <label for="country">Land *</label>
                <select class="custom-select d-block w-100" id="country" name="customer_country" required>
                  <option selected disabled>Kies...</option>
                  @foreach(ChuckEcommerce::getSetting('order.countries') as $country)
                  <option value="{{ $country }}" {{ old('customer_country', ChuckCustomer::address()['country']) == $country ? 'selected' : '' }} >{{ config('chuckcms-module-ecommerce.countries')[$country] }}</option>
                  @endforeach
                </select>
                <div class="invalid-feedback">
                  Gelieve uw land te selecteren.
                </div>
              </div>
            </div>
            <hr class="mb-3">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="company">Bedrijf</label>
                <input type="text" class="form-control" id="company" name="customer_company_name" placeholder="" value="{{ old('customer_company_name', ChuckCustomer::company()['name']) }}">
              </div>
              <div class="col-md-6 mb-3">
                <label for="companyVat">BTW-nummer</label>
                <input type="text" class="form-control" id="companyVat" name="customer_company_vat" placeholder="" value="{{ old('customer_company_vat', ChuckCustomer::company()['vat']) }}">
                <div class="invalid-feedback">
                  BTW-nummer is een verplicht veld.
                </div>
              </div>
            </div>
            <div class="row pt-5">
                <div class="col-12 padding-top-1x">
                    <h4>Verzendadres</h4>
                    <hr class="padding-bottom-1x">
                    <div class="custom-control custom-checkbox d-block">
                        <input type="hidden" name="customer_shipping_equal_to_billing" value="0">
                        <input class="custom-control-input" type="checkbox" name="customer_shipping_equal_to_billing" id="ce_shippingEqualToBilling" value="1" {{ ChuckCustomer::isShippingEqualToBilling() ? 'checked' : '' }}>
                        <label class="custom-control-label" for="ce_shippingEqualToBilling">Verzendadres is gelijk aan mijn facturatie adres</label>
                    </div>
                </div>
            </div>
            <div class="row {{ ChuckCustomer::isShippingEqualToBilling() ? 'd-none' : '' }} mt-3" id="ce_shippingAddress">
                <div class="col-md-7 mb-3">
                    <label for="shipping_street">Adres *</label>
                    <input type="text" class="form-control shipping_address_input" id="shipping_street" name="customer_shipping_street" placeholder="Straatnaam" value="{{ old('customer_shipping_street', ChuckCustomer::address(false)['street']) }}" {{ ChuckCustomer::isShippingEqualToBilling() ? 'disabled' : 'required' }}>
                    <div class="invalid-feedback">
                        Straat is een verplicht veld.
                    </div>
                </div>
                <div class="col-md-5 mb-3">
                    <label for="shipping_housenumber">Huisnummer *</label>
                    <input type="text" class="form-control shipping_address_input" id="shipping_housenumber" name="customer_shipping_housenumber" placeholder="123" value="{{ old('customer_shipping_housenumber', ChuckCustomer::address(false)['housenumber']) }}" {{ ChuckCustomer::isShippingEqualToBilling() ? 'disabled' : 'required' }}>
                    <div class="invalid-feedback">
                        Huisnummer is een verplicht veld.
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="shipping_postalcode">Postcode *</label>
                    <input type="text" class="form-control shipping_address_input" id="shipping_postalcode" placeholder="" name="customer_shipping_postalcode" value="{{ old('customer_shipping_postalcode', ChuckCustomer::address(false)['postalcode']) }}" {{ ChuckCustomer::isShippingEqualToBilling() ? 'disabled' : 'required' }}>
                    <div class="invalid-feedback">
                        Postcode is een verplicht veld.
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="shipping_city">Gemeente *</label>
                    <input type="text" class="form-control shipping_address_input" id="shipping_city" placeholder="" name="customer_shipping_city" value="{{ old('customer_shipping_city', ChuckCustomer::address(false)['city']) }}" {{ ChuckCustomer::isShippingEqualToBilling() ? 'disabled' : 'required' }}>
                    <div class="invalid-feedback">
                        Gemeente is een verplicht veld.
                    </div>
                </div>
                <div class="col-md-5 mb-3">
                    <label for="shipping_country">Land *</label>
                    <select class="custom-select d-block w-100 shipping_address_input" id="shipping_country" name="customer_shipping_country" {{ ChuckCustomer::isShippingEqualToBilling() ? 'disabled' : 'required' }}>
                        <option value="">Kies...</option>
                        @foreach(ChuckEcommerce::getSetting('order.countries') as $country)
                        <option value="{{ $country }}" {{ old('customer_shipping_country', ChuckCustomer::address(false)['country']) == $country ? 'selected' : '' }}>{{ config('chuckcms-module-ecommerce.countries')[$country] }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Gelieve uw land te selecteren.
                    </div>
                </div>
                <div class="col-12">
                    <hr class="margin-top-1x margin-bottom-1x">
                </div>
            </div>
            <div class="row">
                <div class="col-12 padding-top-1x">
                    @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                    @endif

                    <div class="text-right">
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                        <button class="btn btn-blue-g mb-2 mt-2 rounded-0" type="submit">Opslaan</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection


            