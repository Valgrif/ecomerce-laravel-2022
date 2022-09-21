<x-layout>
    <x-layout-admin>
        <h1>Crear una nueva categoría</h1>
        <x-layout-admin.form-components.errors />
        <form action="{{route('create-category')}}" method="post">
        @csrf
        <div class="form-floating mb-3">
            <input class="form-control" type="text" name="name" id="name">
            <label for="name">Nombre de la categoría:</label>
        </div>
        <button type="submmit" class="btn btn-primary"> Crear Categoría</button>
        </form>
    </x-layout-admin>
</x-layout>
