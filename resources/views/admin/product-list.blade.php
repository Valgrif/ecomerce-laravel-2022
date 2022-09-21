<x-layout>
    <x-layout-admin>
        <h1>Lista de productos</h1>
        <div class="container mb-3">
            @foreach ($products as $product)
                <div class="row">
                    <div class="col-12 col-md-4">
                        {{$product->name}}
                    </div>
                    <div class="col-12 col-md-2">
                        {{$product->stock}}
                    </div>
                    <div class="col-12 col-md-2">
                        {{$product->price}}
                    </div>
                    <div class="col-12 col-md-2">
                        {{$product->orders->count()}}
                    </div>
                    <div class="col-12 col-md-2">
                        <a class="btn btn-primary" href="">Editar</a>
                    </div>
                </div>
            @endforeach
        </div>
    </x-layout-admin>
</x-layout>
