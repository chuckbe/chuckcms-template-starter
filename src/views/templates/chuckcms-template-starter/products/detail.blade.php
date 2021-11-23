@extends($template->hintpath.'::templates.' . $template->slug . '.layouts.base')

@section('title')
{{ ChuckProduct::title($repeater) }} | Online Kopen | {{ ChuckSite::getSite('name') }}
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
<script src="https://cdn.chuck.be/assets/plugins/sweetalert2.all.js"></script>
<script>
$(document).ready(function(){
	$('body').on('click', '#note', function (event) {
		swal({
		  title: 'Toegevoegd aan winkelwagen',
		  text: 'Het artikel is toegevoegd aan je winkelwagen.',
		  icon: 'succes',
		  confirmButtonText: 'Ok',
		  confirmButtonColor: '#f9c9a8',
		  showCloseButton: true,
		  buttonsStyling: false
		});
	});
});
</script>
@endsection

@section('content')

<div class="container mb-2">
	<div class="row mt-4">
		<div class="col-md-3 col-xl-3 mb-5 mb-lg-0 d-none d-sm-block">
			<h4 class="text-capitalize mb-3" style="font-weight:700">Categorieën</h4>
		</div>
	
		@php
		$product = $repeater;
		@endphp
	
		<div class="col-md-9 col-xl-9 px-0">
		    <div class="container">
				<div class="card border-0">
					<div class="container-fliud">
						<div class="wrapper row">
							<div class="preview col-md-6">
								
								<div class="{{-- preview-pic --}} tab-content">
									@foreach(ChuckProduct::images($repeater) as $imgKey => $image)
				                        @if(!is_null($image['url']))
				                        <div class="tab-pane{{ $image['is_featured'] ? ' active' : '' }}" id="{{ $imgKey }}"><img src="{{ asset($image['url']) }}" class="img-fluid" alt="{{ ChuckProduct::title($product) }}" /></div>
				                        @endif
				                    @endforeach
								</div>
								<ul class="preview-thumbnail nav nav-tabs">
									@foreach(ChuckProduct::images($repeater) as $imgKey => $image)
				                        @if(!is_null($image['url']))
								  		<li style="cursor: pointer;">
								  			<a data-target="#{{ $imgKey }}" data-toggle="tab" class="{{ $image['is_featured'] ? 'active' : '' }}">
								  				<div class="image-div" style="background: url({{ asset($image['url']) }}) repeat scroll center center / cover;">
								  					{{-- <img src="{{ asset($image['url']) }}" alt="Shop name - {{ ChuckProduct::title($product) }} - thumb"/> --}}
								  				</div>
								  			</a>	
								  		</li>
								  		@endif
				                    @endforeach
								</ul>
								
							</div>
							<div class="details col-md-6">
								<h3 class="product-title">{{ ChuckProduct::title($product) }}</h3>
								
								<h4 class="price">
									@if(count(ChuckProduct::defaultCombination($product)) > 0)
					                <span class="text-muted text-normal ce_product_price_discount {{ ChuckProduct::hasDiscount($product) ? '' : 'd-none' }}" data-price="{{ ChuckProduct::defaultCombination($product)['price']['final'] }}">{{ ChuckEcommerce::formatPrice(ChuckProduct::defaultCombination($product)['price']['final']) }}</span> <span class="ce_product_price_final" data-price="{{ ChuckProduct::hasDiscount($product) ? ChuckProduct::defaultCombination($product)['price']['discount'] : ChuckProduct::defaultCombination($product)['price']['final'] }}">{{ ChuckProduct::hasDiscount($product) ? ChuckEcommerce::formatPrice(ChuckProduct::defaultCombination($product)['price']['discount']) : ChuckEcommerce::formatPrice(ChuckProduct::defaultCombination($product)['price']['final']) }}</span> 
					                @else
					                <span class="text-muted text-normal ce_product_price_discount {{ ChuckProduct::hasDiscount($product) ? '' : 'd-none' }}" data-price="{{ $product->json['price']['final'] }}">{{ ChuckEcommerce::formatPrice($product->json['price']['final']) }}</span> <span class="ce_product_price_final" data-price="{{ ChuckProduct::hasDiscount($product) ? $product->json['price']['discount'] : $product->json['price']['final'] }}">{{ ChuckProduct::hasDiscount($product) ? ChuckEcommerce::formatPrice($product->json['price']['discount']) : ChuckEcommerce::formatPrice($product->json['price']['final']) }}</span> 
					                @endif
					            </h4>
								<p class="vote">Btw inbegrepen</p>
								
								@foreach($repeater->json['attributes'] as $attrKey => $attribute)
				                <div class="sizes">
				                	<label class="d-block mb-0" for="{{ $attrKey }}"><h6 class="d-block mb-0">{{ $attribute['display_name'][$lang] }}: </h6></label>
									<div class="input-group mb-1 d-inline-block w-75">
										<select class="custom-select w-75 ce_attributeSelectInput" id="{{ $attrKey }}" data-attribute-id="{{ $attrKey }}" data-product-id="{{ $repeater->id }}">
										    @foreach($attribute['values'] as $optionKey => $option)
				                            <option value="{{ $option['value'] }}" data-attribute-key="{{ $optionKey }}">{{ $option['display_name'][$lang] }}</option>
				                            @endforeach
										</select>
									</div>
				                </div>
				                @endforeach

				                @if(array_key_exists('options', $repeater->json))
				                @foreach($repeater->json['options'] as $optionKey => $option)
				                <div class="sizes">
				                	<label class="d-block mb-0" for="{{ \Str::slug($optionKey, '_') }}"><small>{{ $optionKey }}: </small></label>
									<div class="input-group mb-2 d-inline-block">
										<select class="custom-select w-75 ce_optionSelectInput" id="{{ \Str::slug($optionKey, '_') }}" data-option-key="{{ $optionKey }}" data-product-id="{{ $repeater->id }}">
										    @foreach( explode('|', $option['value']) as $value)
				                            <option value="{{ $value }}" data-option-key="{{ $optionKey }}">{{ $value }}</option>
				                            @endforeach
										</select>
									</div>
				                </div>
				                @endforeach
				                @endif


				                @if(array_key_exists('extras', $repeater->json))
				                @foreach($repeater->json['extras'] as $extraKey => $extra)
				                <div class="sizes">
									<div class="input-group w-75 mb-2">
									  	<div class="input-group-prepend">
										    <label class="input-group-text" for="{{ \Str::slug($extraKey, '_') }}"><small>{{ $extraKey }}: </small></label>
									  	</div>
									  	<select class="custom-select ce_extraSelectInput" id="{{ \Str::slug($extraKey, '_') }}" data-extra-key="{{ $extraKey }}" data-extra-price="{{ $extra['price'] }}" data-extra-final="{{ $extra['final'] }}" data-product-id="{{ $repeater->id }}">
										    @for ($i = 0; $i <= (int)$extra['maximum']; $i++) 
										    <option value="{{ $i }}" data-extra-key="{{ $extraKey }}">{{ $i }}{{ $extra['final'] && (float)$extra['final'] > 0 && $i > 0 ? ' (+'.ChuckEcommerce::formatPrice(($i * round((float)$extra['final'],2))).')' : '' }}</option>
										    @endfor
										</select>
									</div>
				                </div>
				                @endforeach
				                @endif

				                    


				                <p class="product-description"><small>Artikel #<span class="ce_product_default_sku" data-product-id="{{ $repeater->id }}">{{ ChuckProduct::defaultSKU($repeater) }}</span></small></p>

								{{-- <div class="rating">
									<div class="stars">
										<span class="fal fa-star checked"></span>
										<span class="fal fa-star checked"></span>
										<span class="fal fa-star checked"></span>
										<span class="fal fa-star"></span>
										<span class="fal fa-star"></span>
									</div>
									<span class="review-no">41 reviews</span>
								</div> --}}
								<div class="product-description" style="border-top: 1px solid #dee2e6;padding-top: 2rem;">{!! $product->json['description']['short'][app()->getLocale()] !!}</div>
								<div class="d-flex">
									<div class="form-group mx-auto mx-md-0 w-100">
				                        <label for="quantity">Hoeveelheid</label>
				                        <div class="row">
				                            <input type="hidden" class="ce_combinationInput" name="combination_sku" value="{{ ChuckProduct::defaultSKU($repeater) }}" data-product-id="{{ $repeater->id }}">
				                            <div class="col-auto pr-0">
				                                <button class="btn btn-blue-t btn-sm mt-0 mr-0 ce_subtractionProductBtn" type="button" data-product-id="{{ $repeater->id }}"><b>-</b></button>
				                            </div>
				                            <div class="col-auto mx-0 px-0" style="width:calc( 100% - 83px);">
				                                <input type="number" class="form-control form-control-sm d-inline-block ce_productQuantityInput text-center" min="1" max="{{ count(ChuckProduct::defaultCombination($repeater)) > 0 ? ChuckProduct::defaultCombination($repeater)['quantity'] : $repeater->json['quantity'] }}" value="1" name="quantity" data-product-id="{{ $repeater->id }}" readonly>
				                            </div>
				                            <div class="col-auto pl-0">
				                                <button class="btn btn-blue-t btn-sm mt-0 ce_additionProductBtn w-100" type="button" data-product-id="{{ $repeater->id }}"><b>+</b></button>
				                            </div>
				                        </div>
				                        
				                    </div>
				                </div>
							
								<div class="action d-flex">
									<div class="mx-auto mx-md-0 w-100">
										<button class="add-to-cart btn btn-outline-success ce_addProductToCartBtn w-100 mt-0" data-product-id="{{ $product->id }}" {{ !ChuckProduct::inStock($product) ? 'disabled' : '' }}>Bestellen</button>
										<p class="mt-3 text-green font-weight-bold">Gratis levering vanaf €100</p>
										{{-- <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button> --}}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			{{-- <div class="container pt-5">
			    <div class="row mb-4 mt-5">
			        <div class="col-12 text-center">
			            <h3 class="underline-title p-relative">Beschrijving</h3>
			        </div>
			    </div>
			    <div class="row">
			    	<div class="col-md-8 offset-md-2">
			    		<div class="product-description">{!! $product->json['description']['long'][app()->getLocale()] !!}</div>
			    	</div>
				</div>
			</div> --}}
		</div>
	</div>
</div>

<div class="container pt-5">
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h3 class="underline-title p-relative">Beschrijving</h3>
        </div>
    </div>
    <div class="row">
    	<div class="col-md-8 offset-md-2">
    		<div class="product-description">{!! $product->json['description']['long'][app()->getLocale()] !!}</div>
    	</div>
	</div>
</div>

<div class="container pt-5">
    <div class="row mb-4 mt-5">
        <div class="col-12 text-center">
            <h3 class="underline-title p-relative">Gerelateerde Producten</h3>
        </div>
    </div>
    <div class="row">
    	@foreach(ChuckProduct::all() as $product)
      	<div class="col-lg-3 col-md-4 col-sm-4 col-6 image-main-section">
          	<div class="row img-part">
	            <div class="col-md-12 col-sm-12 col-xs-12 img-section">
	              <img src="{{ ChuckProduct::featuredImage($product) }}" class="img-fluid">
	            </div>
	            <div class="col-md-12 col-sm-12 col-xs-12 image-title mt-2 px-2">
	              <a class="blue" href="{{ ChuckProduct::fullUrl($product) }}"><p class="font-weight-bold text-center">{{ ChuckProduct::title($product) }}</p></a>
	            </div>
	            {{-- <div class="col-md-12 col-sm-12 col-xs-12 image-description px-2 mb-3">
	              {!! $product->json['description']['short'][app()->getLocale()] !!}
	            </div> --}}
	            <div class="row mt-auto mx-0 w-100">
	              <div class="col-md-12 col-sm-12 col-xs-12 image-price">
	                <p class="text-center">{{ ChuckProduct::lowestPrice($product) }}</p>
	              </div>
	              <div class="col-md-12 col-sm-12 col-xs-12 d-flex">
	                <a href="{{ ChuckProduct::fullUrl($product) }}" class="btn btn-outline-primary add-cart-btn mx-auto w-100">Bekijken</a>
	              </div>
	            </div>
          	</div>
        </div>

      	@endforeach
    </div>
</div>
@endsection