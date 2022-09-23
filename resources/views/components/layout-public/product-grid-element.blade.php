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

                <form action="{{route('add-product-cart', ['id'=> $product->id])}}" method="post">
                    @csrf
                <div class="btn-group">
                    <a href="{{route('show-product', ['slug' => $product->slug])}}"
                        class="btn btn-sm btn-outline-secondary">Ver mas...</a>
                        @auth
                        <button type="submit" class="btn btn-lg btn-primary">
                            <i class="bi bi-cart-plus" alt="Añadir al carrito"></i>
                        </button>
                        @endauth
                    </div>
                </form>
                <div>
                    <span class="fs-3">{{ $whole }}</span>
                    <span class="fs-5">{{ $decimal }}€</span>
                </div>
            </div>
        </div>
    </div>
</div>
