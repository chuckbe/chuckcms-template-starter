<!-- Start Shopping Cart -->
<div id="ce_shoppingCartOverviewComponent">
  <div class="row px-3" id="ce_shoppingCartOverviewWrapper">
    <div class="col-12 text-center text-lg-left">
      <h3 class="mt-5 d-inline-block pr-lg-5 mb-5 underline-cart position-relative" data-content="text">Je Winkelwagen</h3>
    </div>
    <div class="col-lg-9" id="ce_shoppingCartOverviewComponent">
      <div class="card-body">
        <form class="coupon-form" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control ce_couponInputField" placeholder="Heb je een coupon?" aria-label="Heb je een coupon?" aria-describedby="button-coupon">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary ce_addCouponButton" type="submit" id="button-coupon">Toevoegen</button>
            </div>
          </div>
        </form>
        <div>
            <span class="ce_couponInputWarning text-danger d-none">Coupon is niet geldig</span>
            <ul class="list-unstyled">
                @foreach(ChuckCart::instance('shopping')->discounts() as $discountKey => $discount)
                <li><i class="fa fa-trash mr-2 ce_removeCouponButton" data-discount="{{ $discountKey }}"></i><b>{{ $discount['code'] }}</b>: -{{ $discount['value'] }}{{ $discount['type'] == 'percentage' ? '%' : '€' }}</li>
                @endforeach
            </ul>
        </div>
      </div>
      <div class="card-body">
          <div class="{{-- table-responsive --}} shopping-cart">
            <table class="table m-0">
              <thead class="d-none d-lg-table-header-group bg-light">
                <tr>
                  <!-- Set columns width -->
                  <th class="text-left py-3 px-4" style="max-width: 440px;width:100%;">Productnaam & Details</th>
                  <th class="text-right py-3 px-4" style="width: 100px;">Prijs</th>
                  <th class="text-center py-3 px-4" style="width: 120px;">Hoeveelheid</th>
                  <th class="text-right py-3 px-4" style="width: 100px;">Totaal</th>
                </tr>
              </thead>
              <tbody>

                @foreach(ChuckCart::instance('shopping')->content() as $item)
                <tr>
                  <td class="p-4">
                    <div class="media align-items-center d-sm-none">
                      <img src="{{ ChuckProduct::featuredImageBySKU($item->id) }}" width="200" class="img-fluid mb-4 d-block mx-auto ui-w-40 ui-bordered mr-4" alt=""/>
                    </div>
                    <div class="media align-items-center">
                      <a href="#" class="shop-tooltip close float-none text-danger text-right ce_removeProductFromCartBtn" title="Verwijderen" data-row-id="{{ $item->rowId }}" data-product-sku="{{ $item->id }}" data-original-title="Remove"><i class="fas fa-times pr-4 trash" style="font-size:18px;"></i></a>
                      <img src="{{ ChuckProduct::featuredImageBySKU($item->id) }}" width="125" class="img-fluid d-block ui-w-40 ui-bordered mr-3" alt=""/>
                      <div class="media-body">
                        <a href="{{ ChuckProduct::getFullUrlBySKU($item->id) }}" class="d-block text-dark title">{{ $item->name }}</a>
                        <a>
                          <small>
                          @foreach($item->options as $oKey => $oValue)
                          {{ $oKey }}: {{ $oValue.(!$loop->last ? ', ' : '') }}
                          @endforeach 
                        </small></a><br>
                        <a>
                          <small>
                          @foreach($item->extras as $eKey => $eValue)
                          {{ $eValue['qty'].'x '.$eKey.': '.ChuckEcommerce::formatPrice((float)$eValue['final'] * (int)$eValue['qty']) }}{!! !$loop->last ? '<br>' : '' !!}
                          @endforeach 
                        </small></a>
                      </div>
                    </div>
                      <div class="media d-inline-block w-100 mt-4 d-lg-none">
                        <div class="col-sm-12 col-md-5 d-inline-block">
                          <p>
                            <span class="font-weight-bold text-blue mr-2">Prijs: </span>{{ ChuckEcommerce::formatPrice($item->_unit) }}
                          </p>
                        </div>
                        <div class="col-sm-7 col-md-6 d-inline-block">
                          <p class="d-inline-block"><span class="font-weight-bold text-blue">Hoeveelheid: </span></p>
                          <div class="ml-2 d-inline-block">
                            <div class="row">
                                <div class="col-auto pr-0">
                                    <button class="btn btn-blue-t btn-sm mt-0 mr-0 ce_subtractionCartProductBtn" type="button" data-product-id="{{ ChuckProduct::sku($item->id)->id }}" data-row-id="{{ $item->rowId }}"><b>-</b></button>
                                </div>
                                <div class="col-auto mx-0 px-0">
                                    <input type="number" class="form-control form-control-sm d-inline-block ce_productCartQuantityInput" min="1" max="{{ ChuckProduct::quantity(ChuckProduct::sku($item->id), $item->id) }}" value="{{ $item->qty }}" name="quantity" data-product-id="{{ ChuckProduct::sku($item->id)->id }}" data-row-id="{{ $item->rowId }}" readonly>
                                </div>
                                <div class="col-auto pl-0">
                                    <button class="btn btn-blue-t btn-sm mt-0 ce_additionCartProductBtn" type="button" data-product-id="{{ ChuckProduct::sku($item->id)->id }}" data-row-id="{{ $item->rowId }}"><b>+</b></button>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-5 col-md-4 d-inline-block p-fix">
                          <p><span class="font-weight-bold text-blue mr-2">Totaal: </span>{{ ChuckEcommerce::formatPrice($item->_total) }}</p>
                        </div>
                      </div>
                  </td>
                  <td class="text-right font-weight-semibold align-middle p-3 price d-none d-lg-table-cell">{{ ChuckEcommerce::formatPrice($item->_unit) }}</td>
                  <td class="align-middle p-3 d-none d-lg-table-cell">
                      <div class="row">
                          <div class="col-auto pl-3 pr-0">
                              <button class="btn btn-blue-t btn-sm mt-0 mr-0 ce_subtractionCartProductBtn" type="button" data-product-id="{{ ChuckProduct::sku($item->id)->id }}" data-row-id="{{ $item->rowId }}"><b>-</b></button>
                          </div>
                          <div class="col-auto mx-0 px-0">
                              <input type="number" class="form-control form-control-sm d-inline-block ce_productCartQuantityInput" min="1" max="{{ ChuckProduct::quantity(ChuckProduct::sku($item->id), $item->id) }}" value="{{ $item->qty }}" name="quantity" data-product-id="{{ ChuckProduct::sku($item->id)->id }}" data-row-id="{{ $item->rowId }}" readonly>
                          </div>
                          <div class="col-auto px-0">
                              <button class="btn btn-blue-t btn-sm mt-0 ce_additionCartProductBtn" type="button" data-product-id="{{ ChuckProduct::sku($item->id)->id }}" data-row-id="{{ $item->rowId }}"><b>+</b></button>
                          </div>
                      </div>
                  </td>
                  <td class="text-right font-weight-semibold align-middle pl-2 pr-4 price d-none d-lg-table-cell">{{ ChuckEcommerce::formatPrice($item->_total) }}</td>
                </tr>
                @endforeach


              </tbody>
            </table>
          </div>
          <!-- / Shopping cart table -->

        {{--  <div class="d-flex flex-wrap justify-content-end align-items-center pb-4">
              <div class="mt-4">
                  <label class="text-muted font-weight-normal karla-text">Promocode</label>
                  <input type="text" placeholder="ABC" class="form-control karla-text">
              </div> 
              <div class="d-flex">
                  <div class="text-right mt-4 mr-5">
                      <label class="text-muted font-weight-normal m-0 karla-text">Korting</label>
                      <div class="text-large price"><strong>€0</strong></div>
                  </div>
                  <div class="text-right mt-4">
                    <label class="text-muted font-weight-normal m-0 karla-text">Totaal bedrag</label>
                    <div class="text-large price"><strong>{{ ChuckEcommerce::formatPrice(ChuckCart::total()) }}</strong></div>
                  </div>
              </div>
          </div>

          <div class="float-right">
              <a href="{{ URL::to('/') }}/cocktails">
                  <button type="button" class="btn btn-lg btn-default md-btn-flat mt-2 mr-3 btn-back">Terug naar winkel</button>
              </a>
              <a href="{{ route('module.ecommerce.checkout.index') }}">
                  <button class="btn btn-lg btn-trans-p mt-2">Afrekenen</button>
              </a>
          </div> --}}

      </div>
    </div>
    <div class="col-lg-3">
      <div class="bg-primary p-4">
        <h4 class="text-white text-center text-lg-left">Overzicht</h4>
        <div class="text-center text-lg-right mt-4">

          @if(ChuckCart::hasDiscount())
          <label class="text-white font-weight-normal m-0">Subtotaal</label>
          <div class="text-large price-total text-green"><strong>{{ ChuckEcommerce::formatPrice(ChuckCart::instance('shopping')->total()) }}</strong></div>
          
          <label class="text-white font-weight-normal m-0">Korting</label>
          <div class="text-large price-total text-green"><strong>{{ ChuckEcommerce::formatPrice(ChuckCart::instance('shopping')->globalDiscount()) }}</strong></div>
          @endif

          <label class="text-white font-weight-normal m-0">Totaal</label>
          <div class="text-large price-total text-green"><strong>{{ ChuckEcommerce::formatPrice(ChuckCart::instance('shopping')->final()) }}</strong></div>
        </div>
        <div class="d-flex mt-4 mt-lg-5">
              <a href="{{ route('module.ecommerce.checkout.index') }}" class="mx-auto mx-lg-0">
                  <button class="btn btn-lg btn-green-tw mt-2 font-weight-bold">Afrekenen</button>
              </a>
        </div>
          <a href="{{ URL::to('/') }}/producten" class="d-block text-white text-center text-lg-left">
              <p class="text-white mt-3 mb-0">Terug naar winkel</p>
          </a>
          
      </div>
    </div>
  </div>
</div>
<!-- End Shopping Cart -->


