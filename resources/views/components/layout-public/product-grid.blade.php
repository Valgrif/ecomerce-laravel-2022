@props(['products', 'name'])

<section id="{{$name}}" class="container-fluid">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <!-- Prodcut List Element -->
        @foreach ($products as $product)
         <x-layout-public.product-grid-element :product="$product" />
        @endforeach
        <!-- End List Element -->
    </div>
</section>
