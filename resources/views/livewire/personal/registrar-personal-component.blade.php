<div>
    <div class="container-fluid px-2 px-md-4">
        <div class="page-header min-height-300 border-radius-xl mt-4"
            style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
            <span class="mask  bg-gradient-primary  opacity-6"></span>
        </div>
        <div class="card card-body mx-3 mx-md-4 mt-n6">
            <div class="card card-plain h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                            <h6 class="mb-3">Datos personales</h6>
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
                    <form wire:submit.prevent='storePersonal'>
                        <div class="row">

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Nombre</label>
                                <input wire:model="nombre" type="text" class="form-control border border-2 p-2">
                                @error('nombre')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Apellidos</label>
                                <input wire:model="apellidos" name="apellidos" type="text" class="form-control border border-2 p-2">
                                @error('apellidos')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Carnet de Identidad</label>
                                <input wire:model="ci" type="text" class="form-control border border-2 p-2">
                                @error('ci')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Fecha de Nacimiento</label>
                                <input wire:model="fecha_nacimiento" type="date"
                                    class="form-control border border-2 p-2">
                                @error('fecha_nacimiento')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Genero</label>
                                <select name="genero" wire:model="genero" class="form-control border border-2 p-2">
                                    <option value="">Seleccionar género</option>
                                    <option value="Femenino">Femenino</option>
                                    <option value="Masculino">Masculino</option>
                                </select>
                                @error('genero')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="card-header pb-0 p-3">
                                <div class="row">
                                    <div class="col-md-8 d-flex align-items-center">
                                        <h6 class="mb-3">Datos de contacto</h6>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Telefono</label>
                                <input wire:model="telefono" type="text" class="form-control border border-2 p-2">
                                @error('telefono')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Distrito</label>
                                <input wire:model="distrito" type="text" class="form-control border border-2 p-2">
                                @error('distrito')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Calle</label>
                                <input wire:model="calle" type="text" class="form-control border border-2 p-2">
                                @error('calle')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Numero de Domicilio</label>
                                <input wire:model="n_casa" type="text" class="form-control border border-2 p-2">
                                @error('n_casa')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="card-header pb-0 p-3">
                                <div class="row">
                                    <div class="col-md-8 d-flex align-items-center">
                                        <h6 class="mb-3">Datos del Empleo</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">

                                <label class="form-label">Cargo</label>
                                <input wire:model="cargo" type="text" class="form-control border border-2 p-2">
                                @error('cargo')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Salario Mensual</label>
                                <input wire:model="salario" type="text" class="form-control border border-2 p-2">
                                @error('salario')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Fecha de Contrato</label>
                                <input wire:model="fecha_inicio_contrato" name="fecha_inicio_contrato"type="date"
                                    class="form-control border border-2 p-2">
                                @error('fecha_inicio_contrato')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Fin del contrato</label>
                                <input wire:model="fecha_fin_contrato" name="fecha_fin_contrato" type="date"
                                    class="form-control border border-2 p-2">
                                @error('fecha_fin_contrato')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Estado</label>
                                <select class="form-control border border-2 p-2" name="estado" id=""
                                    wire:model="estado">
                                    <option value="">Selecione Estado</option>
                                    <option value="Activo">Activo</option>
                                    <option value="Inactivo">Inactivo</option>
                                </select>
                                @error('estado')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>
                        </div>
                        @if (session('status'))
                        <div class="row">
                            <div class="alert alert-success alert-dismissible text-white" role="alert">
                                <span class="text-sm">{{ Session::get('status') }}</span>
                                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                    aria-label="Close">
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
