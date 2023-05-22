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
                            <h6 class="mb-3">Datos Categoria</h6>
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
                    <form wire:submit.prevent='updateMarcas'>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Nombre</label>
                                <input wire:model="name" type="text" class="form-control border border-2 p-2" placeholder="Ingrese nombre correspondiente">
                                @error('name')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
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
                            <div class="mb-3 col-md-6">   
                                <label class="form-label">Imagen</label>
                                <div style="display: flex; justify-content: center; background-color: #f2f2f2;">
                                    <div style="width: 45%; margin: 0 auto; border: 2px solid #333; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); background-color: #fff;">
                                        @if($image && Storage::exists('public/'.$image))
                                            <img src="{{ Storage::url('public/'.$image) }}" style="max-width: 100%; height: auto; border-radius: 10px;">
                                        @else
                                            <img src="{{ $image->temporaryUrl() }}" style="max-width: 100%; height: auto; border-radius: 10px;">
                                        @endif
                                    </div>
                                </div>                                                                
                                <div>
                                    <input type="file" class="form-control-file mt-1" id="image" name="image" accept="image/*" onchange="previewSelectedImage(event); validateFileType(event)" wire:model="image">
                                    <div class="invalid-feedback">Por favor, seleccione un archivo de imagen válido.</div>                              
                                </div>                                
                            </div>                                                                            
                        </div>
                        <button type="button" wire:click="goBack()" class="btn bg-gradient-dark">Cancelar</button>
                        <button type="submit" class="btn bg-gradient-dark">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        let selectedImagePath = ''; 
        function previewSelectedImage(event) {
            event.preventDefault(); 
            const file = event.target.files[0];
            const reader = new FileReader();
            reader.onload = function(event) {
                const imagePath = event.target.result; 
                selectedImagePath = imagePath; 
                document.getElementById("previewImage").setAttribute("src", imagePath);
            };
            reader.readAsDataURL(file);
        }
        function validateFileType(event) {
            const file = event.target.files[0];
            const fileType = file.type;
            const validImageTypes = ['image/jpeg', 'image/png', 'image/gif'];         
            if (!validImageTypes.includes(fileType)) {
                event.target.value = ''; 
                event.target.classList.add('is-invalid');
            } else {
                event.target.classList.remove('is-invalid');
            }
        }      
    </script>
</div>
