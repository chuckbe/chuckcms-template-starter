@extends($template->hintpath.'::templates.' . $template->slug . '.layouts.base')

@section('title')
    Mijn Account | {{ ChuckSite::getSite('name') }}
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

<!-- Orders Table-->
    <div class="row">
        <div class="col-lg-12 py-5">
            <div class="d-none justify-content-end pb-3">
                <div class="form-inline">
                    <label class="text-muted mr-3" for="order-sort">Sorteer</label>
                    <select class="form-control" id="order-sort">
                        <option>Alles</option>
                        <option>Afgeleverd</option>
                        <option>In Verwerking</option>
                        <option>Vertraagd</option>
                        <option>Geannuleerd</option>
                    </select>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="d-none d-lg-table-header-group">
                        <tr class="text-blue">
                            <th style="font-weight:500;">Bestellling #</th>
                            <th style="font-weight:500;">Aankoopdatum</th>
                            <th style="font-weight:500;">Status</th>
                            <th style="font-weight:500;">Totaal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr style="border-top: 1px solid lightgrey;">
                            <td>
                                <div class="row">
                                    <div class="col-6">
                                        <a class="navi-link order-nr" href="{{ route('module.ecommerce.account.order.detail', ['order_number' => $order->json['order_number']]) }}">{{ $order->json['order_number'] }}</a>
                                    </div>
                                    <div class="col-6 d-lg-none">
                                        <span class="badge badge-{{ ChuckEcommerce::getSetting('order.statuses.'.$order->status.'.paid') ? 'success' : 'danger' }} m-0 p-2 float-right">{{ ChuckEcommerce::getSetting('order.statuses.'.$order->status.'.short.'.app()->getLocale())  }}</span>
                                    </div>
                                    <div class="col-6 d-lg-none mt-3">
                                        <a>{{ date('d/m/Y', strtotime($order->created_at)) }}</a>
                                    </div>
                                    <div class="col-6 d-lg-none mt-3">
                                        <span class="price float-right">{{ ChuckEcommerce::formatPrice($order->final) }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="d-none d-lg-table-cell">{{ date('d/m/Y', strtotime($order->created_at)) }}</td>
                            <td class="d-none d-lg-table-cell"><span class="badge badge-{{ ChuckEcommerce::getSetting('order.statuses.'.$order->status.'.paid') ? 'success' : 'danger' }} m-0 p-2">{{ ChuckEcommerce::getSetting('order.statuses.'.$order->status.'.short.'.app()->getLocale())  }}</span></td>
                            <td class="d-none d-lg-table-cell"><span class="price">{{ ChuckEcommerce::formatPrice($order->final) }}</span></td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection