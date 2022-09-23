<x-layout>

    <x-layout-admin>

        <h1>Listado pedidos</h1>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="cart-tab" data-bs-toggle="tab" data-bs-target="#cart-tab-pane"
                    type="button" role="tab" aria-controls="cart-tab-pane" aria-selected="true">Carritos</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="processing-tab" data-bs-toggle="tab" data-bs-target="#processing-tab-pane"
                    type="button" role="tab" aria-controls="processing-tab-pane"
                    aria-selected="false">Procesando</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="sent-tab" data-bs-toggle="tab" data-bs-target="#sent-tab-pane"
                    type="button" role="tab" aria-controls="sent-tab-pane" aria-selected="false">Enviados</button>
            </li>

        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="cart-tab-pane" role="tabpanel" aria-labelledby="cart-tab"
                tabindex="0">...</div>
            <div class="tab-pane fade" id="processing-tab-pane" role="tabpanel" aria-labelledby="processing-tab"
                tabindex="0">
                <div class="container mb-3">
                    <div class="row mb-2">
                        <div class="col-12 col-md-1">
                            Id Pedido
                        </div>
                        <div class="col-12 col-md-2">
                            Usuario
                        </div>
                        <div class="col-12 col-md-4">
                            Direccion
                        </div>
                        <div class="col-12 col-md-1">
                            Importe
                        </div>
                        <div class="col-12 col-md-1">
                            Estado
                        </div>
                        <div class="col-12 col-md-2">
                            Nº de seguimiento
                        </div>
                        <div class="col-12 col-md-1">
                        </div>
                    </div>
                    <hr>
                    @foreach ($processing as $order)
                        <form action="" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$order->id}}">
                            <div class="row mb-2">
                                <div class="col-12 col-md-1">
                                    {{ $order->id }}
                                </div>
                                <div class="col-12 col-md-2">
                                    {{ $order->user->name }}
                                </div>
                                <div class="col-12 col-md-4">
                                    {{ $order->delivery_address }}
                                </div>
                                <div class="col-12 col-md-1">
                                    {{ $order->total_price }}
                                </div>
                                <div class="col-12 col-md-1">
                                    {{$order->status}}
                                </div>
                                <div class="col-12 col-md-2">
                                    <input type="text" name="traking" id="traking" class="form-control" placeholder="nº de traking">
                                </div>
                                <div class="col-12 col-md-1">
                                    <button type="submit" class="btn btn-primary"> Enviar </button>
                                </div>

                            </div>
                        </form>
                    @endforeach
                </div>
                <div class="tab-pane fade" id="sent-tab-pane" role="tabpanel" aria-labelledby="sent-tab" tabindex="0">
                    ...
                </div>
            </div>

    </x-layout-admin>

</x-layout>
