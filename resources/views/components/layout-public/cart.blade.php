@props(['cart'])
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
                {{$product->name}}
            </li>
            @endforeach
        </ul>
    </div>
</div>
