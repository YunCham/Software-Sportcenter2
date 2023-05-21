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
                            <h4 class="mb-3">Crear Nueva Categoría</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    @if (session('status'))
                        <!-- Código de la alerta -->
                    @endif
                    @if (Session::has('demo'))
                        <!-- Código de la alerta -->
                    @endif
                    @if (Session::has('message'))
                        <!-- Código de la alerta -->
                    @endif
                    <form wire:submit.prevent='storeBrand'>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Nombre</label>
                                <input wire:model="name" type="text" class="form-control border border-2 p-2" placeholder="Ingrese nombre de la Categoria" wire:keydown="filterSpecialCharacters">
                                @error('name')
                                    <p class="text-danger inputerror">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Slug</label>
                                <input disabled wire:model="slug" type="text" class="form-control border border-2 p-2" placeholder="Ingrese slug correspondiente">
                                @error('slug')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Icono</label>
                                <input wire:model="icon" type="text" class="form-control border border-2 p-2" placeholder="Ingrese nombre Icono">
                                @error('icon')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>
                        </div>
                        <button type="button" wire:click="goBack()" class="btn btn-danger">Cancelar</button>
                        <button type="submit" class="btn btn-info" style="margin-left: 0.5cm;">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
