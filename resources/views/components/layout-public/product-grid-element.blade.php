@props(['product'])
@php
$price = number_format($product->price, 2, ',', '.');
[$whole, $decimal] = explode(',', $price);
@endphp
<div class="col">
    <div class="card shadow-sm h-100">
        <img class="bd-placeholder-img card-img-top" src="{{ $product->picture }}">
        <div class="card-body d-flex flex-column">
            <h5 class="card-title">{{ $product->name }}</h5>
            <div class="d-flex justify-content-between align-items-center mt-auto flex-wrap-reverse">
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Ver
                        mas...</button>
                    <button type="button" class="btn btn-sm btn-primary"><i class="bi bi-cart-plus"
                            alt="Añadir al carrito"></i></button>
                </div>
                <div>
                    <span class="fs-3">{{ $whole }}</span>
                    <span class="fs-5">{{ $decimal }}€</span>
                </div>
            </div>
        </div>
    </div>
</div>
