<x-layout>
    <x-layout-admin>
        <h1>Crear una nueva etiqueta</h1>
        <x-layout-admin.form-components.errors />
        <form action="{{route('create-tag')}}" method="post">
        @csrf
        <div class="form-floating mb-3">
            <input class="form-control" type="text" name="name" id="name">
            <label for="name">Nombre etiqueta nueva:</label>
        </div>
        <button type="submmit" class="btn btn-primary"> Crear etiqueta</button>
        </form>
    </x-layout-admin>
</x-layout>
