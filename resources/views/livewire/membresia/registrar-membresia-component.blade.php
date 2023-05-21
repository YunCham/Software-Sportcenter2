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
                            <h6 class="mb-3">Datos de la Membresia</h6>
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
                    <form wire:submit.prevent='storeMembresia'>
                        <div class="row">

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Nombre</label>
                                <input wire:model="nombre" type="text" class="form-control border border-2 p-2">
                                @error('nombre')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Costo</label>
                                <input wire:model="precio" name="precio" type="number"
                                    class="form-control border border-2 p-2">
                                @error('precio')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <label class="form-label">Estado</label>
                                        <select class="form-control border border-2 p-2" name="estado" id=""
                                            wire:model="estado">
                                            <option value="">Selecione Estado</option>
                                            <option value="Activo">Activo</option>
                                            <option value="Desactivo">Desactivo</option>


                                        </select>
                                        @error('estado')
                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                    </div>
                                    {{-- <div class="col">
                                        <label class="form-label">Inicio de membresia</label>
                                        <input wire:model="fecha_inicio" type="date"
                                            class="form-control border border-2 p-2">
                                        @error('fecha_inicio')
                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label class="form-label">Fin de membresia</label>
                                        <input wire:model="fecha_fin" type="date"
                                            class="form-control border border-2 p-2">
                                        @error('fecha_fin')
                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                    </div> --}}
                                </div>
                            </div>

                            {{-- <div class="mb-3 col-md-6">

                                <label class="form-label">Estado</label>
                                <select class="form-control border border-2 p-2" name="estado" id=""
                                    wire:model="estado">
                                    <option value="">Selecione Estado</option>
                                    <option value="0">Activo</option>
                                    <option value="1">Desactivo</option>

                                </select>
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Inicio de membresia</label>
                                <input wire:model="fecha_inicio" type="date"
                                    class="form-control border border-2 p-2">
                                @error('fecha_inicio')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">

                                <label class="form-label">Fin de membresia</label>
                                <input wire:model="fecha_fin" type="date" class="form-control border border-2 p-2">
                                @error('fecha_fin')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div> --}}

                            <div class="card-header pb-0 p-3">
                                <div class="row">
                                    <div class="col-md-8 d-flex align-items-center">
                                        <h6 class="mb-3">Seleciona los servicios requeridos:</h6>
                                    </div>
                                </div>
                            </div>
                            {{-- 
                            <div class="form-check">
                                @foreach ($membresia->servicio as $servicio)
                                    <li>{{ $servicio->nombre }}</li>
                                    <input class="form-check-input" type="checkbox" value="" id="fcustomCheck1"
                                        checked="">
                                    <label class="custom-control-label" for="customCheck1">{{ $servicio->nombre }}</label>
                                @endforeach
                            </div> --}}

                            {{-- <div>
                                <div class="form-check">
                                    @foreach ($servicios as $servicio)
                                        <input class="form-check-input" type="checkbox" value="{{ $servicio->id }}" id="servicio_{{ $servicio->id }}">
                                        <label class="custom-control-label" for="servicio_{{ $servicio->id }}">{{ $servicio->nombre }}</label>
                                    @endforeach
                                </div>
                            </div>
---con livew --}}
                            <div>
                                <ul class="list-group">
                                    @foreach ($servicios as $servicio)
                                        <li class="list-group-item">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    value="{{ $servicio->id }}" id="servicio_{{ $servicio->id }}"
                                                    wire:model="selectedServicios.{{ $servicio->id }}">
                                                <label class="form-check-label"
                                                    for="servicio_{{ $servicio->id }}">{{ $servicio->nombre }}</label>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                @error('selectedServicios')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- <div class="mb-3 col-md-6">

                                <label class="form-label">Personal</label>
                                <select class="form-control border border-2 p-2" name="personal_id" id=""
                                    wire:model="personal_id">
                                    <option value="">Selecione al perosnal</option>
                                    @foreach ($personales as $personal)
                                        <option value="{{ $personal->id }}">{{ $personal->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('name')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div> --}}

                            <div class="mb-3 col-md-12">

                                <label for="floatingTextarea2">Acerca:</label>
                                <textarea wire:model="descripcion" class="form-control border border-2 p-2" placeholder=" Say something about yourself"
                                    id="floatingTextarea2" rows="4" cols="50"></textarea>
                                @error('descripcion')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>
                        </div>

                        @if (session('status'))
                            <div class="row">
                                <div class="alert alert-success alert-dismissible text-white" role="alert">
                                    <span class="text-sm">{{ Session::get('status') }}</span>
                                    <button type="button" class="btn-close text-lg py-3 opacity-10"
                                        data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        @endif

                        <button type="button" wire:click="goBack()" class="btn bg-gradient-dark">Cancelar</button>
                        <button type="submit" class="btn bg-gradient-dark">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
