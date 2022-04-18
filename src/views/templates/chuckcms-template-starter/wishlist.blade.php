@extends($template->hintpath.'::templates.' . $template->slug . '.layouts.base')

@section('title')
    {{ $page->title }}
@endsection

@section('meta')
@php 
$lang = \LaravelLocalization::getCurrentLocale();
@endphp
@include('chuckcms::meta.tags', ['page' => $page])
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
    .wishlist-item-image{
        max-width: 100px
    }
    @media (min-width: 768px) {
        .wishlist-item-image{
            max-width: 50px
        }
    }
    @media (min-width: 992px) {
        .product-variations {
            position: absolute;
        }
    }
</style>
@endsection

@section('scripts')

@endsection

@section('content')
<div class="container p-5">
    <div class="row">
        <div class="col-12 d-flex flex-column flex-md-row">
            <h1 class="h3">
                Jouw favoriete items
            </h1>
            <div class="px-3 pb-3 pb-md-0">
                <a href="#" class="text-color-main lh-lg pe-1"><i class="far fa-user"></i></a>
                <a href="#" class="text-color-main lh-lg pe-1"><i class="far fa-box"></i></a>
                <a href="#" class="text-color-main lh-lg pe-1"><i class="far fa-heart"></i></a>
                <a href="#" class="text-color-main lh-lg pe-1"><i class="far fa-sign-out"></i></a>
            </div>
        </div>
        <div class="col-12 col-xl-5 pe-xl-5">
            <p class="pe-xl-5">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                sed do eiusmod tempor incidunt ut labore et dolore
            </p>
        </div>
    </div>
    <div class="row my-3 bg-white shadow rounded">
        <div class="col-12 px-5 py-3">
            <div class="row py-3">
                <div class="col-12 col-md-2 col-lg-1 rounded align-items-center bg-grey p-3 d-flex justify-content-center align-items-center order-1 order-md-0">
                    <img class="img-fluid wishlist-item-image" src="{{asset('chuckbe/chuckcms-template-starter/img/pngkey.com-old-chair-png-4074957.png')}}">
                </div>
                <div class="col-12 col-md-3 col-xl-2 order-2 order-md-1">
                    <div class="d-flex h-100 justify-content-center flex-column pt-3 pt-md-0">
                        <span class="fw-bold">Lorem ipsum dolor</span>
                        <span class="text-muted small">Meubels</span>
                    </div>
                </div>
                <div class="col-12 col-md-2 col-lg-2 col-xl-3 text-center order-3 order-md-2">
                    <div class="d-flex h-100 w-100 py-3 py-md-0 justify-content-start justify-content-md-center align-items-center">
                        <div class="rounded-circle bg-dark" style="height: 1rem; width: 1rem;"></div>
                        <span class="px-2">Black</span>
                    </div>
                </div>
                <div class="col-12 col-md-2 col-lg-2 col-xl-1 order-4 order-md-3">
                    <div class="row h-100 justify-content-md-center align-items-center">
                        <div class="col-1 col-md-3 p-0 rounded-pill-left d-flex">
                            <button class="btn btn-blue-t btn-sm mt-0 ms-auto me-0 ce_subtractionCartProductBtn" style="background-color: #EAECEF; border-radius: 50% 0 0 50%;" type="button" data-product-id="" data-row-id=""><b>-</b></button>
                        </div>
                        <div class="col-6 col-md-6 mx-0 px-0">
                            <input type="number" class="form-control form-control-sm d-inline-block ce_productCartQuantityInput border-0 rounded-0" min="1" max="" value="2" name="quantity" data-product-id="" data-row-id="" readonly>
                        </div>
                        <div class="col-1 col-md-3 p-0 d-flex">
                            <button class="btn btn-blue-t btn-sm mt-0 me-auto ce_additionCartProductBtn" type="button" data-product-id="" data-row-id="" style="background-color: #EAECEF; border-radius: 0% 50% 50% 0;"><b>+</b></button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-2 col-lg-3 d-flex order-5 order-md-4">
                    <p class="fw-bold text-center mx-md-auto my-auto lh-lg h5 pt-3 pt-md-0">€999</p>
                </div>
                <div class="col-12 col-md-1 d-flex justify-content-center align-items-center order-0 order-md-5">
                    <a href="#" class="bg-grey text-muted px-2 py-1 rounded-top rounded-right rounded-bottom rounded-left ms-auto my-3 m-md-0"><i class="fas fa-trash-alt"></i></a>
                </div>
            </div>
            <div class="row py-3">
                <div class="col-12 col-md-2 col-lg-1 rounded align-items-center bg-grey p-3 d-flex justify-content-center align-items-center order-1 order-md-0">
                    <img class="img-fluid wishlist-item-image" src="{{asset('chuckbe/chuckcms-template-starter/img/pngkey.com-old-chair-png-4074957.png')}}">
                </div>
                <div class="col-12 col-md-3 col-xl-2 order-2 order-md-1">
                    <div class="d-flex h-100 justify-content-center flex-column pt-3 pt-md-0">
                        <span class="fw-bold">Lorem ipsum dolor</span>
                        <span class="text-muted small">Meubels</span>
                    </div>
                </div>
                <div class="col-12 col-md-2 col-lg-2 col-xl-3 text-center order-3 order-md-2">
                    <div class="d-flex h-100 w-100 py-3 py-md-0 justify-content-start justify-content-md-center align-items-center">
                        <div class="rounded-circle bg-dark" style="height: 1rem; width: 1rem;"></div>
                        <span class="px-2">Black</span>
                    </div>
                </div>
                <div class="col-12 col-md-2 col-lg-2 col-xl-1 order-4 order-md-3">
                    <div class="row h-100 justify-content-md-center align-items-center">
                        <div class="col-1 col-md-3 p-0 rounded-pill-left d-flex">
                            <button class="btn btn-blue-t btn-sm mt-0 ms-auto me-0 ce_subtractionCartProductBtn" style="background-color: #EAECEF; border-radius: 50% 0 0 50%;" type="button" data-product-id="" data-row-id=""><b>-</b></button>
                        </div>
                        <div class="col-6 col-md-6 mx-0 px-0">
                            <input type="number" class="form-control form-control-sm d-inline-block ce_productCartQuantityInput border-0 rounded-0" min="1" max="" value="2" name="quantity" data-product-id="" data-row-id="" readonly>
                        </div>
                        <div class="col-1 col-md-3 p-0 d-flex">
                            <button class="btn btn-blue-t btn-sm mt-0 me-auto ce_additionCartProductBtn" type="button" data-product-id="" data-row-id="" style="background-color: #EAECEF; border-radius: 0% 50% 50% 0;"><b>+</b></button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-2 col-lg-3 d-flex order-5 order-md-4">
                    <p class="fw-bold text-center mx-md-auto my-auto lh-lg h5 pt-3 pt-md-0">€999</p>
                </div>
                <div class="col-12 col-md-1 d-flex justify-content-center align-items-center order-0 order-md-5">
                    <a href="#" class="bg-grey text-muted px-2 py-1 rounded-top rounded-right rounded-bottom rounded-left ms-auto my-3 m-md-0"><i class="fas fa-trash-alt"></i></a>
                </div>
            </div>
            <div class="row py-3">
                <div class="col-12 col-md-2 col-lg-1 rounded align-items-center bg-grey p-3 d-flex justify-content-center align-items-center order-1 order-md-0">
                    <img class="img-fluid wishlist-item-image" src="{{asset('chuckbe/chuckcms-template-starter/img/pngkey.com-old-chair-png-4074957.png')}}">
                </div>
                <div class="col-12 col-md-3 col-xl-2 order-2 order-md-1">
                    <div class="d-flex h-100 justify-content-center flex-column pt-3 pt-md-0">
                        <span class="fw-bold">Lorem ipsum dolor</span>
                        <span class="text-muted small">Meubels</span>
                    </div>
                </div>
                <div class="col-12 col-md-2 col-lg-2 col-xl-3 text-center order-3 order-md-2">
                    <div class="d-flex h-100 w-100 py-3 py-md-0 justify-content-start justify-content-md-center align-items-center">
                        <div class="rounded-circle bg-dark" style="height: 1rem; width: 1rem;"></div>
                        <span class="px-2">Black</span>
                    </div>
                </div>
                <div class="col-12 col-md-2 col-lg-2 col-xl-1 order-4 order-md-3">
                    <div class="row h-100 justify-content-md-center align-items-center">
                        <div class="col-1 col-md-3 p-0 rounded-pill-left d-flex">
                            <button class="btn btn-blue-t btn-sm mt-0 ms-auto me-0 ce_subtractionCartProductBtn" style="background-color: #EAECEF; border-radius: 50% 0 0 50%;" type="button" data-product-id="" data-row-id=""><b>-</b></button>
                        </div>
                        <div class="col-6 col-md-6 mx-0 px-0">
                            <input type="number" class="form-control form-control-sm d-inline-block ce_productCartQuantityInput border-0 rounded-0" min="1" max="" value="2" name="quantity" data-product-id="" data-row-id="" readonly>
                        </div>
                        <div class="col-1 col-md-3 p-0 d-flex">
                            <button class="btn btn-blue-t btn-sm mt-0 me-auto ce_additionCartProductBtn" type="button" data-product-id="" data-row-id="" style="background-color: #EAECEF; border-radius: 0% 50% 50% 0;"><b>+</b></button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-2 col-lg-3 d-flex order-5 order-md-4">
                    <p class="fw-bold text-center mx-md-auto my-auto lh-lg h5 pt-3 pt-md-0">€999</p>
                </div>
                <div class="col-12 col-md-1 d-flex justify-content-center align-items-center order-0 order-md-5">
                    <a href="#" class="bg-grey text-muted px-2 py-1 rounded-top rounded-right rounded-bottom rounded-left ms-auto my-3 m-md-0"><i class="fas fa-trash-alt"></i></a>
                </div>
            </div>
            <div class="row py-3">
                <div class="col-12 col-md-2 col-lg-1 rounded align-items-center bg-grey p-3 d-flex justify-content-center align-items-center order-1 order-md-0">
                    <img class="img-fluid wishlist-item-image" src="{{asset('chuckbe/chuckcms-template-starter/img/pngkey.com-old-chair-png-4074957.png')}}">
                </div>
                <div class="col-12 col-md-3 col-xl-2 order-2 order-md-1">
                    <div class="d-flex h-100 justify-content-center flex-column pt-3 pt-md-0">
                        <span class="fw-bold">Lorem ipsum dolor</span>
                        <span class="text-muted small">Meubels</span>
                    </div>
                </div>
                <div class="col-12 col-md-2 col-lg-2 col-xl-3 text-center order-3 order-md-2">
                    <div class="d-flex h-100 w-100 py-3 py-md-0 justify-content-start justify-content-md-center align-items-center">
                        <div class="rounded-circle bg-dark" style="height: 1rem; width: 1rem;"></div>
                        <span class="px-2">Black</span>
                    </div>
                </div>
                <div class="col-12 col-md-2 col-lg-2 col-xl-1 order-4 order-md-3">
                    <div class="row h-100 justify-content-md-center align-items-center">
                        <div class="col-1 col-md-3 p-0 rounded-pill-left d-flex">
                            <button class="btn btn-blue-t btn-sm mt-0 ms-auto me-0 ce_subtractionCartProductBtn" style="background-color: #EAECEF; border-radius: 50% 0 0 50%;" type="button" data-product-id="" data-row-id=""><b>-</b></button>
                        </div>
                        <div class="col-6 col-md-6 mx-0 px-0">
                            <input type="number" class="form-control form-control-sm d-inline-block ce_productCartQuantityInput border-0 rounded-0" min="1" max="" value="2" name="quantity" data-product-id="" data-row-id="" readonly>
                        </div>
                        <div class="col-1 col-md-3 p-0 d-flex">
                            <button class="btn btn-blue-t btn-sm mt-0 me-auto ce_additionCartProductBtn" type="button" data-product-id="" data-row-id="" style="background-color: #EAECEF; border-radius: 0% 50% 50% 0;"><b>+</b></button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-2 col-lg-3 d-flex order-5 order-md-4">
                    <p class="fw-bold text-center mx-md-auto my-auto lh-lg h5 pt-3 pt-md-0">€999</p>
                </div>
                <div class="col-12 col-md-1 d-flex justify-content-center align-items-center order-0 order-md-5">
                    <a href="#" class="bg-grey text-muted px-2 py-1 rounded-top rounded-right rounded-bottom rounded-left ms-auto my-3 m-md-0"><i class="fas fa-trash-alt"></i></a>
                </div>
            </div>
            <div class="row py-3">
                <div class="col-12 col-md-2 col-lg-1 rounded align-items-center bg-grey p-3 d-flex justify-content-center align-items-center order-1 order-md-0">
                    <img class="img-fluid wishlist-item-image" src="{{asset('chuckbe/chuckcms-template-starter/img/pngkey.com-old-chair-png-4074957.png')}}">
                </div>
                <div class="col-12 col-md-3 col-xl-2 order-2 order-md-1">
                    <div class="d-flex h-100 justify-content-center flex-column pt-3 pt-md-0">
                        <span class="fw-bold">Lorem ipsum dolor</span>
                        <span class="text-muted small">Meubels</span>
                    </div>
                </div>
                <div class="col-12 col-md-2 col-lg-2 col-xl-3 text-center order-3 order-md-2">
                    <div class="d-flex h-100 w-100 py-3 py-md-0 justify-content-start justify-content-md-center align-items-center">
                        <div class="rounded-circle bg-dark" style="height: 1rem; width: 1rem;"></div>
                        <span class="px-2">Black</span>
                    </div>
                </div>
                <div class="col-12 col-md-2 col-lg-2 col-xl-1 order-4 order-md-3">
                    <div class="row h-100 justify-content-md-center align-items-center">
                        <div class="col-1 col-md-3 p-0 rounded-pill-left d-flex">
                            <button class="btn btn-blue-t btn-sm mt-0 ms-auto me-0 ce_subtractionCartProductBtn" style="background-color: #EAECEF; border-radius: 50% 0 0 50%;" type="button" data-product-id="" data-row-id=""><b>-</b></button>
                        </div>
                        <div class="col-6 col-md-6 mx-0 px-0">
                            <input type="number" class="form-control form-control-sm d-inline-block ce_productCartQuantityInput border-0 rounded-0" min="1" max="" value="2" name="quantity" data-product-id="" data-row-id="" readonly>
                        </div>
                        <div class="col-1 col-md-3 p-0 d-flex">
                            <button class="btn btn-blue-t btn-sm mt-0 me-auto ce_additionCartProductBtn" type="button" data-product-id="" data-row-id="" style="background-color: #EAECEF; border-radius: 0% 50% 50% 0;"><b>+</b></button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-2 col-lg-3 d-flex order-5 order-md-4">
                    <p class="fw-bold text-center mx-md-auto my-auto lh-lg h5 pt-3 pt-md-0">€999</p>
                </div>
                <div class="col-12 col-md-1 d-flex justify-content-center align-items-center order-0 order-md-5">
                    <a href="#" class="bg-grey text-muted px-2 py-1 rounded-top rounded-right rounded-bottom rounded-left ms-auto my-3 m-md-0"><i class="fas fa-trash-alt"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection