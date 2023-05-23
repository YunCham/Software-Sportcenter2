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
                                            @if ($imageOp!=null)
                                                <img src="{{ $imageOp->temporaryUrl() }}" style="max-width: 100%; height: auto; border-radius: 10px;">
                                            @else
                                                <img src="data:image/jpeg;base64,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" style="max-width: 100%; height: auto; border-radius: 10px;">
                                            @endif
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
