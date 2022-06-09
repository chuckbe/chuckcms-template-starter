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
<style>
    .star-block .small {
        font-size: 0.75rem;
    }
    .shoporderoption{
        -webkit-appearance: none;
        -moz-appearance: none;
        background: transparent;
        background-image: url("data:image/svg+xml;utf8,<svg fill='rgb(255, 118, 0)' height='24' viewBox='0 0 24 24' width='24' xmlns='http://www.w3.org/2000/svg'><path d='M7 10l5 5 5-5z'/><path d='M0 0h24v24H0z' fill='none'/></svg>");
        background-repeat: no-repeat;
        background-position-x: 100%;
        background-position-y: 40%;
        border: 1px solid #dfdfdf;
        border-radius: 2px;
        margin-right: 1rem;
        padding: 0 1rem;
    }
    .shoporderoption option:hover,  .shoporderoption option:focus{
        background: rgba(255, 118, 0, 0.5) !important;
    }
    .shoporderoption:hover, .shoporderoption:focus {
        box-shadow: none;
    }
    .shop-img {
        height: 350px;
        object-fit: contain;
        object-position: center;
    }
    .addtowishlist:hover i, .addtowishlist:focus i {
        font-weight: 900;
    }
    .chuckradiobtn:checked {
        background-color: var(--main-color);
        border-color: var(--main-color);
        box-shadow: none;
        background-image: none !important;
    }
    
    .product-variations img{
        border-color: transparent;
    }
    .product-variations img:hover, .product-variations img.selected{
        border: 2px solid var(--main-color);
    }
    .product-tile {
        background-size: contain;
        background-repeat: no-repeat;
        min-height: 400px;
    }
    @media (min-width: 992px) {
        .product-variations {
            position: absolute;
        }
    }
</style>
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
@php
$product = $repeater;
@endphp

<div class="container pb-5">
    <div class="row pt-0 pb-3 py-lg-5 flex-column flex-lg-row">
    	@if(count(ChuckProduct::images($repeater)) > 0)
        <div class="col-12 col-lg-6 px-0 px-lg-5 position-relative">
        	@foreach(ChuckProduct::images($repeater) as $imgKey => $image)
            @if(!is_null($image['url']) && $image['is_featured'])
            <div class="ms-0 ms-xl-5 me-auto rounded overflow-hidden tile product-tile h-100 scale" style="background-image: url({{asset($image['url'])}})"></div>
            @break
            @endif
            @endforeach
            <div class="row gx-5 justify-content-center product-variations bottom-0">
            	@foreach(ChuckProduct::images($repeater) as $imgKey => $image)
                    @if(!is_null($image['url']))
                    <div class="col-3 col-md-2 col-lg-3 col-xl-2 px-3">
	                    <img class="img-thumbnail rounded shadow border-main-color{{ $image['is_featured'] ? ' selected' : '' }}" src="{{asset($image['url'])}}" alt="{{ ChuckProduct::title($product) }}">
	                </div>
                    @endif
                @endforeach
            </div>
        </div>
        @endif
        <div class="col-12 col-lg-6">
            <div class="py-5 pe-xl-5 me-lg-5">
                <h1 class="lh-sm h2">
                    {{ ChuckProduct::title($product) }}
                </h1>
                <h4 class="price">
					@if(count(ChuckProduct::defaultCombination($product)) > 0)
	                <span class="text-muted text-normal ce_product_price_discount {{ ChuckProduct::hasDiscount($product) ? '' : 'd-none' }}" data-price="{{ ChuckProduct::defaultCombination($product)['price']['final'] }}">{{ ChuckEcommerce::formatPrice(ChuckProduct::defaultCombination($product)['price']['final']) }}</span> <span class="ce_product_price_final" data-price="{{ ChuckProduct::hasDiscount($product) ? ChuckProduct::defaultCombination($product)['price']['discount'] : ChuckProduct::defaultCombination($product)['price']['final'] }}">{{ ChuckProduct::hasDiscount($product) ? ChuckEcommerce::formatPrice(ChuckProduct::defaultCombination($product)['price']['discount']) : ChuckEcommerce::formatPrice(ChuckProduct::defaultCombination($product)['price']['final']) }}</span> 
	                @else
	                <span class="text-muted text-normal ce_product_price_discount {{ ChuckProduct::hasDiscount($product) ? '' : 'd-none' }}" data-price="{{ $product->json['price']['final'] }}">{{ ChuckEcommerce::formatPrice($product->json['price']['final']) }}</span> <span class="ce_product_price_final" data-price="{{ ChuckProduct::hasDiscount($product) ? $product->json['price']['discount'] : $product->json['price']['final'] }}">{{ ChuckProduct::hasDiscount($product) ? ChuckEcommerce::formatPrice($product->json['price']['discount']) : ChuckEcommerce::formatPrice($product->json['price']['final']) }}</span> 
	                @endif
	            </h4>
				<p class="vote text-muted">incl. btw</p>
                <div class="d-flex flex-column flex-md-row">
                    <div class="d-flex">
                        <div class="star-block pb-0 pb-md-3 pb-lg-0">
                            <span class="fa fa-star checked small" aria-hidden="true"></span>
                            <span class="fa fa-star checked small" aria-hidden="true"></span>
                            <span class="fa fa-star checked small" aria-hidden="true"></span>
                            <span class="fa fa-star checked small" aria-hidden="true"></span>
                            <span class="fal fa-star checked small" aria-hidden="true"></span>
                        </div>
                        <span class="text-muted small d-block lh-lg px-3">1234 reviews</span>
                    </div>
                    <a href="#" class="text-decoration-none addtowishlist py-2 py-md-0"><i class="far fa-heart text-color-main"></i><span class="text-muted small lh-lg px-1">voeg toe aan wishlist</span></a>
                </div>

                <p class="product-description"><small>Artikel #<span class="ce_product_default_sku" data-product-id="{{ $repeater->id }}">{{ ChuckProduct::defaultSKU($repeater) }}</span></small></p>

                <p class="text-muted mb-1">Beschrijving</p>
                <div>{!! $product->json['description']['short'][app()->getLocale()] !!}</div>


                @foreach($repeater->json['attributes'] as $attrKey => $attribute)
                <div class="sizes mb-3">
                	<label class="d-block mb-0" for="{{ $attrKey }}"><p class="text-muted mb-1">{{ $attribute['display_name'][$lang] }}</p></label>
					<div class="input-group mb-1 d-inline-block w-75">
						<select class="form-select w-75 ce_attributeSelectInput" id="{{ $attrKey }}" data-attribute-id="{{ $attrKey }}" data-product-id="{{ $repeater->id }}">
						    @foreach($attribute['values'] as $optionKey => $option)
                            <option value="{{ $option['value'] }}" data-attribute-key="{{ $optionKey }}">{{ $option['display_name'][$lang] }}</option>
                            @endforeach
						</select>
					</div>
                </div>
                @endforeach

                @if(array_key_exists('options', $repeater->json))
                @foreach($repeater->json['options'] as $optionKey => $option)
                <div class="sizes mb-3">
                	<label class="d-block mb-0" for="{{ \Str::slug($optionKey, '_') }}"><small>{{ $optionKey }}: </small></label>
					<div class="input-group mb-2 d-inline-block">
						<select class="form-select w-75 ce_optionSelectInput" id="{{ \Str::slug($optionKey, '_') }}" data-option-key="{{ $optionKey }}" data-product-id="{{ $repeater->id }}">
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
                <div class="sizes mb-3">
					<div class="input-group w-75">
					  	<div class="input-group-prepend">
						    <label class="input-group-text" for="{{ \Str::slug($extraKey, '_') }}"><small>{{ $extraKey }}: </small></label>
					  	</div>
					  	<select class="form-select ce_extraSelectInput" id="{{ \Str::slug($extraKey, '_') }}" data-extra-key="{{ $extraKey }}" data-extra-price="{{ $extra['price'] }}" data-extra-final="{{ $extra['final'] }}" data-product-id="{{ $repeater->id }}">
						    @for ($i = 0; $i <= (int)$extra['maximum']; $i++) 
						    <option value="{{ $i }}" data-extra-key="{{ $extraKey }}">{{ $i }}{{ $extra['final'] && (float)$extra['final'] > 0 && $i > 0 ? ' (+'.ChuckEcommerce::formatPrice(($i * round((float)$extra['final'],2))).')' : '' }}</option>
						    @endfor
						</select>
					</div>
                </div>
                @endforeach
                @endif

                {{-- @TODO: make sure that attributes are displayed the way they need to be displayed thus: select / radio / ... <div class="mb-3">
                    <p class="text-muted mb-1">Kleur</p>
                    <div class="d-flex">
                        <div class="form-check pe-3">
                            <input class="form-check-input chuckradiobtn" type="radio" name="color" id="color1" checked="checked">
                            <label class="form-check-label small" for="color1">
                            White
                            </label>
                        </div>
                        <div class="form-check pe-3">
                            <input class="form-check-input chuckradiobtn" type="radio" name="color" id="color2">
                            <label class="form-check-label small" for="color2">
                                turquoise
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input chuckradiobtn" type="radio" name="color" id="color3">
                            <label class="form-check-label small" for="color3">
                                Dark-grey
                            </label>
                        </div>
                    </div>
                </div> --}}

                <div class="d-flex">
					<div class="form-group mx-auto mx-md-0 w-100">
                        <label for="quantity"><p class="text-muted mb-1">Hoeveelheid</p></label>
                        <input type="hidden" class="ce_combinationInput" name="combination_sku" value="{{ ChuckProduct::defaultSKU($repeater) }}" data-product-id="{{ $repeater->id }}">
                        <div class="input-group">
							<button class="btn btn-sm btn-outline-secondary ce_subtractionProductBtn" type="button" data-product-id="{{ $repeater->id }}"><b>-</b></button>
							<input type="number" class="form-control form-control-sm text-center ce_productQuantityInput" min="1" max="{{ count(ChuckProduct::defaultCombination($repeater)) > 0 ? ChuckProduct::defaultCombination($repeater)['quantity'] : $repeater->json['quantity'] }}" value="1" name="quantity" data-product-id="{{ $repeater->id }}" readonly>
							<button class="btn btn-sm btn-outline-secondary ce_additionProductBtn" type="button" data-product-id="{{ $repeater->id }}"><b>+</b></button>
						</div>
                        
                    </div>
                </div>


                <button class="btn chuck-btn bg-main-color text-white px-4 rounded d-flex flex-row mt-4 ce_addProductToCartBtn" data-product-id="{{ $product->id }}" {{ !ChuckProduct::inStock($product) ? 'disabled' : '' }}>
                	<span class="btn-text">In winkelwagen</span><span class="after">></span>
                </button>
            </div>
        </div>
    </div>
</div>



<div class="container">  
    <div class="row justify-content-center">
        <div class="col-12 col-xl-10">
            <div class="row pt-0 pb-3 py-lg-5">
                <div class="col-12 col-md-8 col-lg-6 col-xl-6">
                    <p class="h2 lh-sm">
                        Andere artikelen die je misschien
                        <span class="underline position-relative fw-600">interessante</span>
                        vindt
                    </p>
                </div>
            </div>
            <div class="row">
            	@foreach(ChuckProduct::all() as $related)
                <div class="col-12 col-md-6 col-lg-4 p-3">
                    <div class="card border-0 p-xl-3">
                        <div class="px-3">
                            <img src="{{asset($related->json['images']['image0']['url'])}}" class="card-img-top shop-img rounded" alt="...">
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ ChuckProduct::title($related) }} - <b>{{ ChuckProduct::lowestPrice($related) }}</b></p>
                        </div>
                    </div>
                </div> 
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg-main-color">
    <div class="container py-5">
        <div class="row px-xl-5 justify-content-center">
            <div class="col-12 col-lg-6 col-xl-5 text-white pe-xl-5 py-lg-5">
                <p class="h2 lh-sm pe-xl-5">
                    Contacteer ons nu
                    <span class="position-relative fw-600">vrijblijvend
                        <svg class="position-absolute w-100 start-0" style="bottom: -1rem" version="1.1" id="Laag_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 0 841.9 65.4" style="enable-background:new 0 0 841.9 65.4;" xml:space="preserve">
                            <style type="text/css">
                                .st0{fill:none;stroke:#fff;stroke-width:11.064;stroke-linecap:round;}
                            </style>
                            <path id="Path_2" class="st0" d="M31.8,43.1c0,0,614.7-25.9,779,0"/>
                        </svg>
                    </span>
                </p>
                <div class="pe-xl-4">
                    <p class="py-5 pe-xl-5">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do 
                        eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut 
                        enim.
                    </p>
                </div>
            </div>
            <div class="col-12 col-lg-6 text-white">
                <div>
                    <form class="contact-form pt-4" id="ccms_form_contact" action="{{URL::to(`/`)}}/forms/validate" method="post">
                        @csrf        
                        <div class="row g-5 py-3">
                            <div class="col-12">
                                <input type="text" class="form-control" name="gegeven_1" id="gegeven_1"  placeholder="Gegevens #1" required>
                            </div>
                        </div>
                        <div class="row g-5 py-3">
                            <div class="col-12">
                                <input type="text" class="form-control" name="gegeven_1" id="gegeven_1"  placeholder="Gegevens #1" required>
                            </div>
                        </div>
                        <div class="row g-5 py-3">
                            <div class="col-12">
                                <input type="text" class="form-control" name="gegeven_1" id="gegeven_1"  placeholder="Gegevens #1" required>
                            </div>
                        </div>
                        {!! Honeypot::generate('chuck_telephone', 'chuck_email') !!}
                        <input type="hidden" value="contact" name="_form_slug">
                        <button class="btn bg-white chuck-btn shadow-sm px-4 py-2 rounded fw-600 me-auto d-flex flex-row mt-4" id="send_form_btn"><span class="btn-text">Button #1</span><span class="after">></span></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


















{{-- <div class="container mb-2">
	<div class="row mt-4">
		<div class="col-md-3 col-xl-3 mb-5 mb-lg-0 d-none d-sm-block">
			<h4 class="text-capitalize mb-3" style="font-weight:700">Categorieën</h4>
		</div>
	
		<div class="col-md-9 col-xl-9 px-0">
		    <div class="container">
				<div class="card border-0">
					<div class="container-fliud">
						<div class="wrapper row">
							<div class="preview col-md-6">
								
								<div class="tab-content">
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
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
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
</div> --}}

@endsection