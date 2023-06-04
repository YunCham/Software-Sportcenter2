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
                            <h6 class="mb-3">Datos Usuario</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
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
                      <div class="alert alert-danger alert-dismissible" role="alert">{{ Session::get('message') }}</div>
                  @endif
                    <form wire:submit.prevent='updateUsuario'>
                        <div class="row">

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Nombre</label>
                                <input wire:model="name" type="text" class="form-control border border-2 p-2">
                                @error('name')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Correo Eleccion</label>
                                <input wire:model="email" name="email" type="text"
                                    class="form-control border border-2 p-2">
                                @error('email')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Contraseña</label>
                                <input wire:model="password" type="password" class="form-control border border-2 p-2">
                                @error('password')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

                                <label class="form-label">Ciudad</label>
                                <input wire:model="location" type="location" class="form-control border border-2 p-2">
                                @error('location')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">

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
                          </div>

                            <div class="mb-3 col-md-12">

                                <label for="floatingTextarea2">Acerca:</label>
                                <textarea wire:model="about" class="form-control border border-2 p-2" placeholder=" Say something about yourself"
                                    id="floatingTextarea2" rows="4" cols="50"></textarea>
                                @error('about')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
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
