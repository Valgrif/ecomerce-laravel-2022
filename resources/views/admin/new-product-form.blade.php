<x-layout>
    <x-layout-admin>
        <h1>Crear un nuevo producto</h1>
        <!--NO OLVIDES EL ENCTYPE PARA ARCHIVO Y EL csrf-->
        <form action="{{ route('create-product') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-floating mb-3">
                <input class="form-control" type="text" name="name" id="name" placeholder="Nombre del Prodcuto">
                <label for="name">Nombre de producto: </label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" name="short_description" id="short_description" placeholder="Descripcion Corta"></textarea>
                <label for="short_description">Descripción corta: </label>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-md-6">
                    <!-- COLUMNA IZQ -->
                    <div class="form-floating mb-3">
                        <textarea class="form-control" style="height: 50rem" name="content" id="content" placeholder="Descripción:"></textarea>
                        <label for="content">Descripción:</label>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <!-- COLUMNA DERECHA -->
                    <div class="form-floating mb-3">
                        <label for="picture" class="form-label"></label>
                        <input type="file" class="form-control" name="picture" id="picture">
                    </div>
                    <div class="input-group mb3">
                        <div class="form-floating">
                            <input class="form-control" type="number" name="price" id="price"
                                placeholder="Precio:" min="0" step="0.01">
                            <label for="price">Precio:</label>
                        </div>
                        <span class="input-group-text">€</span>
                    </div>
                    <div class="input-group mb3">
                        <div class="form-floating">
                            <input class="form-control" type="number" name="stock" id="stock"
                                placeholder="Stock:" min="0">
                            <label for="stock">Stock:</label>
                        </div>
                        <span class="input-group-text">Uds</span>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Categoría</span>
                        <select name="category_id" id="category_id" class="form-select">
                            <option value="">--- Slecciona una categoría ---</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <h6>Etiquetas</h6>
                        <div class="row">
                            @foreach ($tags as $tag)
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="tags[]"
                                            value="{{ $tag->id }}" id="flexCheckDefault">
                                        <label class="form-check-label" for="tag-{{ $tag->id }}">
                                            {{ $tag->name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div> <!-- FIN COLUMNAS -->


            <button type="submit" class="btn btn-primary">Crear producto</button>
        </form>
    </x-layout-admin>
</x-layout>
