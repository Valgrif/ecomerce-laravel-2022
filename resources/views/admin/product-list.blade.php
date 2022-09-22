<x-layout>
    <x-layout-admin>
        <h1>Lista de productos</h1>
        <div class="container mb-3">
            <div class="row mb-2">
                <div class="col-12 col-md-4">
                    Nombre del producto
                </div>
                <div class="col-12 col-md-2">
                    Stock
                </div>
                <div class="col-12 col-md-2">
                    Precio
                </div>
                <div class="col-12 col-md-2">
                    Ventas
                </div>
                <div class="col-12 col-md-2">
                    <a class="btn btn-primary" href="/admin/new-product">Nuevo producto</a>
                </div>
            </div>
            <hr>
            @foreach ($products as $product)
                <div class="row mb-2">
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
                        <a class="btn btn-danger" href="">Borrar</a>
                    </div>
                </div>
            @endforeach
        </div>
    </x-layout-admin>
</x-layout>
