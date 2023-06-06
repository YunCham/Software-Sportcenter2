<div>
    <div class="container-fluid px-2 px-md-4">
        <div class="page-header min-height-300 border-radius-xl mt-4"
            style="background-image: url('https://images.unsplash.com/photo-1578271887552-5ac3a72752bc?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
            <span class="mask  bg-gradient-primary  opacity-6"></span>
        </div>
        <div class="card card-body mx-3 mx-md-4 mt-n6">
            <div class="card card-plain h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                            <h6 class="mb-3">NOTA DE COMPRA</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">

                    @if (Session::has('demo'))
                        <div class="row">
                            <div class="alert alert-danger alert-dismissible text-white" role="alert">
                                <span class="text-sm">{{ Session::get('demo') }}</span>
                                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    @endif
                    {{-- alerta --}}
                    @if (Session::has('message'))
                        <div class="alert alert-danger alert-dismissible" role="alert">{{ Session::get('message') }}
                        </div>
                    @endif
                    <form wire:submit.prevent='updateCompra'>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Proveedor</label>
                                <select name="tipo_id" id="" class="form-control border border-2 p-2"
                                    wire:model="proveedor_id">
                                    <option value="">Seleccionar Proveedor</option>
                                    @foreach ($proveedores as $proveedor)
                                        <option value="{{ $proveedor->id }}">{{ $proveedor->name }}</option>
                                    @endforeach
                                </select>
                                @error('proveedor_id')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">

                                <label class="form-label">Monto Total</label>
                                <input wire:model="total" name="precio" type="text"
                                    class="form-control border border-2 p-2">
                                @error('total')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <label class="form-label">Fecha y hora</label>
                                        <input wire:model="fecha_hora" type="datetime-local"
                                            class="form-control border border-2 p-2">
                                        @error('fecha_hora')
                                            <p class="text-danger inputerror">{{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>
                            </div>



                            <div class="card-header pb-0 p-3">
                                <div class="row">
                                    <div class="col-md-8 d-flex align-items-center">
                                        <h6 class="mb-3">Seleciona los productos requeridos:</h6>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <ul class="list-group">
                                    @foreach ($productos as $producto)
                                        <li class="list-group-item"
                                            style="display: flex; justify-content: space-between; align-items: center;">
                                            <div class="form-check">
                                                {{-- este input de checkbox fue clave --}}
                                                <input class="form-check-input" type="checkbox"
                                                    value="{{ $producto->id }}" id="producto_{{ $producto->id }}"
                                                    wire:model="selectedProductos.{{ $producto->id }}">

                                                <label class="form-check-label"
                                                    for="producto_{{ $producto->id }}">{{ $producto->descripcion }}</label>
                                                <label class="form-check-label" for="precio_{{ $producto->id }}">
                                                    -----> Precio: BS.{{ $producto->precio }}</label>
                                            </div>
                                            <div style="display: flex; align-items: center;">
                                                <label for="cantidad_{{ $producto->id }}"
                                                    style="margin-right: 5px;">Cantidad:</label>
                                                <input type="number" id="cantidad_{{ $producto->id }}"
                                                    wire:model="cantidad.{{ $producto->id }}"
                                                    class="form-control border border-2 p-2">
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                                @error('selectedProductos')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                @error('cantidad')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                        </div>

                        <button type="button" wire:click="goBack()" class="btn bg-gradient-dark">Cancelar</button>
                        <button type="submit" class="btn bg-gradient-dark">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
