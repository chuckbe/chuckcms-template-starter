<!-- Start Shopping Cart -->
<div id="ce_shoppingCartOverviewComponent">
  <div id="ce_shoppingCartOverviewWrapper">
    <div class="row px-lg-5">
        <div class="col-12 d-flex flex-column flex-md-row">
            <h1 class="h2">Winkelmandje</h1>
        </div>
        <div class="col-12 d-flex flex-column flex-md-row cartnav py-4">
            <a href="#" class="text-decoration-none cartnavitem active">
                <span class="cartnavnumber text-white me-2 d-flex justify-content-center align-items-center small">1</span>
                Cart
            </a>
            <span class="px-md-3 px-lg-5 cartarrow"><i class="far fa-long-arrow-right"></i></span>
            <a href="#" class="text-decoration-none cartnavitem">
                <span class="cartnavnumber text-white me-2 d-flex justify-content-center align-items-center small">2</span>
                Verzending
            </a>
            <span class="px-md-3 px-lg-5 cartarrow"><i class="far fa-long-arrow-right"></i></span>
            <a href="#" class="text-decoration-none cartnavitem">
                <span class="cartnavnumber text-white me-2 d-flex justify-content-center align-items-center small">3</span>
                Betaling
            </a>
            <span class="px-md-3 px-lg-5 cartarrow"><i class="far fa-long-arrow-right"></i></span>
            <a href="#" class="text-decoration-none cartnavitem">
                <span class="cartnavnumber text-white me-2 d-flex justify-content-center align-items-center small">4</span>
                Controle & confirmatie
            </a>
        </div>
    </div>

    @if(ChuckCart::instance('shopping')->content()->count() > 0)
    <div class="row px-lg-5 g-5">
        <div class="col-12 col-lg-8">
            <div class="bg-white shadow rounded mb-3">
                <div class="row p-3 justify-content-center">
                    <form class="coupon-form" method="post">
                        <div class="input-group">
                            <input type="text" class="form-control ce_couponInputField" placeholder="Heb je een coupon?" aria-label="Heb je een coupon?" aria-describedby="button-coupon">
                            <button class="btn btn-outline-secondary ce_addCouponButton" type="submit" id="button-coupon">Toevoegen</button>
                        </div>
                    </form>
                    <div>
                        <span class="ce_couponInputWarning text-danger d-none">Coupon is niet geldig</span>
                        <ul class="list-unstyled mb-0">
                            @foreach(ChuckCart::instance('shopping')->discounts() as $discountKey => $discount)
                            <li><i class="fa fa-trash mr-2 ce_removeCouponButton" data-discount="{{ $discountKey }}"></i><b>{{ $discount['code'] }}</b>: -{{ $discount['value'] }}{{ $discount['type'] == 'percentage' ? '%' : '€' }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow rounded">
                @foreach(ChuckCart::instance('shopping')->content() as $item)
                <div class="row py-3 justify-content-center">
                    <div class="col-2 col-md-1 col-lg-1 rounded align-items-center bg-grey p-3 d-flex justify-content-center align-items-center order-0 order-md-0">
                        <img class="img-fluid wishlist-item-image" src="{{ ChuckProduct::featuredImageBySKU($item->id) }}">
                    </div>
                    <div class="col-5 col-md-3 col-xl-3 order-1 order-md-1">
                        <div class="d-flex h-100 justify-content-center flex-column pt-3 pt-md-0">
                            <span class="fw-bold"><a href="{{ ChuckProduct::getFullUrlBySKU($item->id) }}" class="text-dark">{{ $item->name }}</a></span>
                            @foreach($item->options as $oKey => $oValue)
                            <span class="text-muted small">{{ ucfirst($oKey) }}: {{ $oValue.(!$loop->last ? ', ' : '') }}</span>
                            @endforeach 
                            @foreach($item->extras as $eKey => $eValue)
                            <span class="text-muted small">{{ $eValue['qty'].'x '.$eKey.': '.ChuckEcommerce::formatPrice((float)$eValue['final'] * (int)$eValue['qty']) }}</span>
                            @endforeach 
                        </div>
                    </div>
                    <div class="col-4 col-md-2 col-lg-2 col-xl-2 text-center order-3 order-md-2">
                        <div class="d-flex h-100 w-100 py-3 py-md-0 justify-content-start justify-content-md-center align-items-center">
                            <span class="fw-bold">{{ ChuckEcommerce::formatPrice($item->_unit) }}</span>
                        </div>
                    </div>
                    <div class="col-4 col-md-2 col-lg-2 col-xl-2 order-4 order-md-3">
                        <div class="row h-100 justify-content-md-center align-items-center">
                            <div class="col-1 col-md-3 p-0 rounded-pill-left d-flex">
                                <button class="btn btn-blue-t btn-sm mt-0 ms-auto me-0 ce_subtractionCartProductBtn" style="background-color: #EAECEF; border-radius: 50% 0 0 50%;" type="button" data-product-id="{{ ChuckProduct::sku($item->id)->id }}" data-row-id="{{ $item->rowId }}"><b>-</b></button>
                            </div>
                            <div class="col-6 col-md-6 mx-0 px-0">
                                <input type="number" class="form-control form-control-sm d-inline-block ce_productCartQuantityInput text-center border-0 rounded-0" min="1" max="{{ ChuckProduct::quantity(ChuckProduct::sku($item->id), $item->id) }}" value="{{ $item->qty }}" name="quantity" data-product-id="{{ ChuckProduct::sku($item->id)->id }}" data-row-id="{{ $item->rowId }}" readonly>
                            </div>
                            <div class="col-1 col-md-3 p-0 d-flex">
                                <button class="btn btn-blue-t btn-sm mt-0 me-auto ce_additionCartProductBtn" type="button" data-product-id="{{ ChuckProduct::sku($item->id)->id }}" data-row-id="{{ $item->rowId }}" style="background-color: #EAECEF; border-radius: 0% 50% 50% 0;"><b>+</b></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-8 col-md-2 col-lg-2 d-flex order-5 order-md-4">
                        <p class="fw-bold text-center mx-md-auto my-auto lh-lg h5 pt-0">{{ ChuckEcommerce::formatPrice($item->_total) }}</p>
                    </div>
                    <div class="col-2 col-md-1 d-flex justify-content-center align-items-center order-2 order-md-5">
                        <a href="#" class="bg-grey text-muted px-2 py-1 rounded-top rounded-right rounded-bottom rounded-left ms-auto my-3 m-md-0 ce_removeProductFromCartBtn" title="Verwijderen" data-row-id="{{ $item->rowId }}" data-product-sku="{{ $item->id }}" data-original-title="Remove"><i class="fas fa-trash-alt"></i></a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="d-flex w-100">
                <a href="#" class="ms-auto text-color-main text-decoration-none d-block my-3"><span class="pe-3"><i class="fas fa-long-arrow-left"></i></span>Terug naar winkel</a>
            </div>
        </div>


        <div class="col-12 col-lg-4">
            <div class="bg-white shadow rounded p-3">
                <h5 class="text-center pb-3">Overzicht</h5>
                @if(ChuckCart::hasDiscount())
                <div class="row mx-0 py-2">
                    <div class="col-12 col-md-6 text-start text-muted">Subtotaal</div>
                    <div class="col-12 col-md-6 text-end"><span class="fw-bold">{{ ChuckEcommerce::formatPrice(ChuckCart::instance('shopping')->total()) }}</span></div>
                </div>
                <div class="row mx-0 py-2">
                    <div class="col-12 col-md-6 text-start text-muted">Korting</div>
                    <div class="col-12 col-md-6 text-end"><span class="fw-bold text-color-main">- {{ ChuckEcommerce::formatPrice(ChuckCart::instance('shopping')->globalDiscount()) }}</span></div>
                </div>
                @endif
                <div class="row mx-0 py-2">
                    <div class="col-12 col-md-6 text-start text-muted">Totaal</div>
                    <div class="col-12 col-md-6 text-end"><span class="fw-bold">{{ ChuckEcommerce::formatPrice(ChuckCart::instance('shopping')->final()) }}</span></div>
                </div>
                <a href="{{ route('module.ecommerce.checkout.index') }}" class="btn chuck-btn bg-main-color text-white px-4 rounded d-flex flex-row m-auto my-3"><span class="btn-text">Afrekenen</span><span class="after">></span></a>
            </div>
        </div>
    </div>
    @else
    <div class="row px-lg-5 g-5">
        <div class="col-12">
            <div class="bg-white shadow rounded mb-3">
                <div class="row px-3 py-5 justify-content-center text-center">
                    <h2 class="h3">Je hebt nog geen producten in je mandje.</h2>
                    <a href="#" class="text-color-main text-decoration-none d-block my-3"><span class="pe-3"><i class="fas fa-long-arrow-left"></i></span>Terug naar winkel</a>
                </div>
            </div>
        </div>
    </div>
    @endif
  </div>

</div>
<!-- End Shopping Cart -->


