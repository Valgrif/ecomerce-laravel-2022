<x-layout>
    <x-layout-public :cart="$cart">
        <h3 class="text-muted">{{$product->category->name}}</h3>
        <div class="row">
            <div class="col-12 col-md-4">
                <img src="{{$product->picture}}" class="img-fluid" alt="">
            </div>
            <div class="col-12 col-md-8">
                <h1>{{$product->name}}</h1>
                <p class="fs-3">{{$product->price}}€</p>
                <p>{{$product->content}}</p>
                <p>{{$product->short_description}}</p>
                @foreach ($product->tags as $tag )
                    <a class="btn btn-outline-dark" href="#">{{$tag->name}}</a>
                @endforeach
            </div>
        </div>
        <h3 class="m-3">Productos relacionados</h3>
        @php
            $name = "related";
        @endphp
        <x-layout-public.product-grid
            :products="$related_products"
            :name="$name"
        />
    </x-layout-public>
</x-layout>
