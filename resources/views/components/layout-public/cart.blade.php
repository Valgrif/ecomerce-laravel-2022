@php
    $cart = get_cart();
@endphp
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">Carrito</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        @if ($cart->products->count() == 0)
            <p>El carrito está vacío</p>
        @endif
        <ul class="list-group">
            @foreach ($cart->products as $product )
            <li class="list-group-item">
                <div class="row">
                    <div class="col-12 md-10">
                        {{$product->name}}
                    </div>
                    <div class="col-12 md-2">
                        {{$product->price}}
                    </div>
                </div>
            </li>
            @endforeach
            <li class="list-group-item">
                <h3>Precio total</h3>
               <p> {{$cart->total_price}}€</p>
               <a href="{{route('checkout')}}" class="btn btn-primary">Checkout</a>
            </li>
        </ul>
    </div>
</div>
