<x-layout>
    <x-layout-public>
        <!--Hero-->
        <section id="hero" class="container-fluid">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="/images/portada_img.jpg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes"
                        loading="lazy" width="350" height="250">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold lh-1 mb-3">Responsive left-aligned hero with image</h1>
                    <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the
                        world’s most popular front-end open source toolkit, featuring Sass variables and mixins,
                        responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Primary</button>
                        <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button>
                    </div>
                </div>
            </div>
        </section>

        <section id="prducts" class="container-fluid">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <!-- Prodcut List Element -->
                @foreach ($products as $product)
                    @php
                        $price = number_format($product->price, 2, ',', '.');
                        list($whole, $decimal) = explode(',',$price);
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
                                        <button type="button" class="btn btn-sm btn-primary"><i class="bi bi-cart-plus" alt="Añadir al carrito"></i></button>
                                    </div>
                                    <div>
                                        <span class="fs-3">{{$whole}}</span>
                                        <span class="fs-5">{{$decimal}}€</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- End List Element -->
            </div>
        </section>


    </x-layout-public>
</x-layout>
