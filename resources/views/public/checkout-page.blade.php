@php
    $cart = get_cart();
@endphp
<x-layout>
    <x-layout-public>
        <div class="row g-5">
            <div class="col-md-5 col-lg-4 order-md-last">
              <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-primary">Tu Carrito</span>
                <span class="badge bg-primary rounded-pill">{{$cart->products->count()}}</span>
              </h4>
              <ul class="list-group mb-3">

                @foreach ($cart->products as $product )
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                      <h6 class="my-0">{{$product->name}}</h6>
                      <small class="text-muted">{{$product->short_description}}</small>
                    </div>
                    <span class="text-muted">{{$product->price}}€</span>
                </li>
                @endforeach
                <li class="list-group-item d-flex justify-content-between">
                  <span>Precio Total (EUR)</span>
                  <strong>{{$cart->total_price}}€</strong>
                </li>
              </ul>

            </div>
            <div class="col-md-7 col-lg-8">
              <h4 class="mb-3">Datos de envío</h4>
              <form class="needs-validation" novalidate="" action="{{route('process-checkout')}}" method="post">
                @csrf
                <div class="row g-3">

                  <div class="col-12">
                    <label for="address" class="form-label" >Línea 1 de Dirección</label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="Calle Falsa 12" required="">
                  </div>

                  <div class="col-12">
                    <label for="address2" class="form-label">Línea 2 de Dirección <span class="text-muted">(Opcional)</span></label>
                    <input type="text" class="form-control" name="address2" id="address2" placeholder="Escalera, piso, puerta">
                  </div>

                  <div class="col-md-5">
                    <label for="country" class="form-label">País</label>
                    <select class="form-select" name="country" id="country" required="">
                      <option value="">Elige...</option>
                      <option value="España">España</option>
                      <option value="Andorra">Andorra</option>
                      <option value="Nueva Zelanda">Nuevva Zelanda</option>
                    </select>
                  </div>

                  <div class="col-md-4">
                    <label for="state" class="form-label">Provincia</label>
                    <select class="form-select" name="state" id="state" required="">
                      <option value="">Elige...</option>
                      <option value="S/C de Tenerife">S/C de Tenerife</option>
                      <option value="Las Palmas de Gran Canaria">Las palmas</option>
                      <option value="Barcelona">Barcelona</option>
                      <option value="Andalucía">Andalucía</option>
                    </select>
                  </div>

                  <div class="col-md-3">
                    <label for="zip" class="form-label">Código postal</label>
                    <input type="text" class="form-control" name="zip" id="zip" placeholder="" required="">
                  </div>
                </div>

                <hr class="my-4">

                <div class="row gy-3">
                  <div class="col-md-6">
                    <label for="cc-name" class="form-label">Titular</label>
                    <input type="text" name="cc-name" class="form-control" id="cc-name" placeholder="" required="">
                    <small class="text-muted">Nombre completo del titular</small>
                  </div>

                  <div class="col-md-6">
                    <label for="cc-number" class="form-label">Número de Tarjeta de credito</label>
                    <input type="text" class="form-control" name="cc-number" id="cc-number" placeholder="" required="">
                  </div>

                  <div class="col-md-3">
                    <label for="cc-expiration" class="form-label">Caducidad</label>
                    <input type="text" class="form-control" name="cc-expiration" id="cc-expiration" placeholder="" required="">
                  </div>

                  <div class="col-md-3">
                    <label for="cc-cvv" class="form-label">CVV</label>
                    <input type="text" name="cc-cvv" class="form-control" id="cc-cvv" placeholder="" required="">
                  </div>
                </div>

                <hr class="my-4">

                <button class="w-100 btn btn-primary btn-lg" type="submit">Realizar compra</button>
              </form>
            </div>
          </div>
    </x-layout-public>
</x-layout>
