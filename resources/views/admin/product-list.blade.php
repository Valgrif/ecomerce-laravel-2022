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




<x-layout
    title="Lista Productos"
    meta-description="Lista Productos meta description"
>
    <x-layout-admin>

        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-light text-center ms-auto">

            <!-- <h2 class="py-3 display-5">Lista productos</h2> -->
            <div class="table-responsive rounded-3">
                <table class="table align-middle table-dark table-striped">

                    <thead>
                        <tr>
                            <th scope="col">Lista productos</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Controles</th>
                        </tr>
                    </thead>

                    <tbody class="table-group-divider">

                        @foreach ($products->sortByDesc('updated_at') as $product)
                            <tr>

                                <td>
                                    <a class="text-decoration-none text-light link-info"
                                        href="{{ route('edit-product-form', $product->id) }}">
                                        {{ $product->name }}
                                    </a>
                                </td>
                                <th scope="row">
                                    {{ $product->price }}
                                </th>
                                <td>
                                    {{ $product->stock }} uds
                                </td>
                                <td class="d-flex justify-content-evenly py-5 gap-2">

                                    <button class="bg-transparent border-0 align-item-center"
                                        style="box-sizing:content-box">
                                        <a class="text-warning" href="{{ route('edit-product-form', $product->id) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                            </svg>
                                        </a>
                                    </button>

                                    <form action="{{ route('delete-product', $product) }}" method="POST">
                                        @csrf
                                        @method('delete')
