@extends($template->hintpath.'::templates.' . $template->slug . '.layouts.base')

@section('title')
    Order Overview
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
<div class="container mb-5">
    <div class="row">
        <div class="col-12">
            <h3 class="mt-2 mt-md-5 d-inline-block pr-lg-5 pb-5 underline-account position-relative" data-content="text">Mijn Bestelling <small class="badge badge-primary">#{{ $order->json['order_number'] }}</small></h3>
        </div>
    </div>
    
    @include($template->hintpath.'::templates.' . $template->slug . '.includes.nav-account')

    <div class="row">
        <div class="col-lg-12 py-5">
            <div class="padding-top-2x mt-2 hidden-lg-up"></div>
            <p><b>Verzendingmethode: </b>{{ $order->json['shipping']['name'] }}</p>
            <div class="table-responsive">
                <table class="table table-hover margin-bottom-none">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Hvl</th>
                        <th>Prijs</th>
                        <th>Totaal</th>
                    </tr>
                    </thead>
                    @if(!array_key_exists('_price', array_values($order->json['products'])[0]))
                    <tbody>
                    @foreach($order->json['products'] as $product)
                    <tr>
                        <td>
                            <a class="text-medium navi-link" href="#" data-toggle="modal" data-target="#orderDetails">{{ $product['title'] }}</a>
                            @if($product['options'])
                            <br>
                            <small>{{ $product['options_text'] }}</small>
                            @endif
                            @isset($product['extras'])
                            <br>
                            <small>{{ $product['extras_text'] }}</small>
                            @endisset
                        </td>
                        <td>{{ $product['quantity'] }}</td>
                        <td>{{ ChuckEcommerce::formatPrice($product['price_tax'])  }}</td>
                        <td><span class="text-medium">{{ ChuckEcommerce::formatPrice($product['total']) }}</span></td>
                    </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Subtotaal</td>
                        <td><span class="text-medium">{{ ChuckEcommerce::formatPrice($order->subtotal + $order->subtotal_tax) }}</span></td>
                    </tr>
                    @if($order->hasDiscount)
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Korting</td>
                        <td><span class="text-medium">{{ ChuckEcommerce::formatPrice($order->discount + $order->discount_tax) }}</span></td>
                    </tr>
                    @endif
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Verzending</td>
                        <td><span class="text-medium">{{ $order->shipping > 0 ? ChuckEcommerce::formatPrice($order->shipping + $order->shipping_tax) : 'gratis' }}</span></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Totaal
                            <br>
                            <small>
                                <span class="ce_checkoutTaxPrice">{{ ChuckEcommerce::formatPrice($order->total_tax) }}</span> BTW inbegrepen. 
                            </small>
                        </td>
                        <td>
                            <span class="text-medium">{{ ChuckEcommerce::formatPrice($order->final) }}</span>
                        </td>
                    </tr>
                    </tbody>
                    @else
                    <tbody>
                    @foreach($order->json['products'] as $product)
                    <tr>
                        <td>
                            <a class="text-medium navi-link" href="#" data-toggle="modal" data-target="#orderDetails">{{ $product['title'] }}</a>
                            @if($product['options'])
                            <br>
                            <small>{{ $product['options_text'] }}</small>
                            @endif
                            @isset($product['extras'])
                            <br>
                            <small>{{ $product['extras_text'] }}</small>
                            @endisset
                        </td>
                        <td>{{ $product['quantity'] }}</td>
                        <td>{{ ChuckEcommerce::formatPrice($product['_price']['_unit'])  }}</td>
                        <td><span class="text-medium">{{ ChuckEcommerce::formatPrice($product['_price']['_total']) }}</span></td>
                    </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Subtotaal</td>
                        <td><span class="text-medium">{{ ChuckEcommerce::formatPrice($order->subtotal + ($order->isTaxed ? 0 : $order->subtotal_tax)) }}</span></td>
                    </tr>
                    @if($order->hasDiscount)
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Korting</td>
                        <td><span class="text-medium">-{{ ChuckEcommerce::formatPrice($order->discount + $order->discount_tax) }}</span></td>
                    </tr>
                    @endif
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Verzending</td>
                        <td><span class="text-medium">{{ $order->shipping > 0 ? ChuckEcommerce::formatPrice($order->shipping + $order->shipping_tax) : 'gratis' }}</span></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Totaal
                            <br>
                            <small>
                                <span class="ce_checkoutTaxPrice">{{ ChuckEcommerce::formatPrice($order->total_tax) }}</span> BTW inbegrepen. 
                            </small>
                        </td>
                        <td>
                            <span class="text-medium">{{ ChuckEcommerce::formatPrice($order->final) }}</span>
                        </td>
                    </tr>
                    </tbody>
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End My Profile -->

@endsection