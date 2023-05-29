    
    <div>
        <div class="container-fluid px-2 px-md-4">
            <div class="page-header min-height-300 border-radius-xl mt-4"
                style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
                <span class="mask  bg-gradient-primary  opacity-6"></span>
            </div>
            <div class="card card-body mx-2 mx-md-3 mt-n6">
                <div class="card card-plain h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-3">Formulario Registro Producto</h6>
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
                        <form wire:submit.prevent='submitForm'>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Nombre</label>
                                    <input wire:model="name" type="text" class="form-control border border-2 p-2">
                                    @error('name')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Slug</label>
                                    <input disabled wire:model="slug" type="text" class="form-control border border-2 p-2" placeholder="Slug correspondiente al nombre del Producto">
                                    @error('slug')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="category_id" class="form-label">Categoría</label>
                                    <select wire:model="category_id" wire:change="updateSubcategories" class="form-control @error('category_id') is-invalid @enderror custom-select" id="category_id">
                                        <option value="">Seleccionar</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    @if ($subcategories->isNotEmpty())
                                        <label for="subcategory_id" class="form-label">Sub Categoría</label>
                                        <select wire:model="subcategory_id" class="form-control @error('subcategory_id') is-invalid @enderror custom-select" id="subcategory_id">
                                            <option value="">Seleccionar</option>
                                            @foreach ($subcategories as $subcategory)
                                                <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                            @endforeach
                                        </select>
                                    @else   
                                        <option value="">No hay subcategorías disponibles</option>
                                        <div>
                                            <a class="btn btn-primary" style="margin-right: 0.9cm; border: 2px solid #555;  border-radius: 10px; padding: 10px 20px; font-weight: bold; transition: box-shadow 0.3s;  box-shadow: 0 3px 7px rgba(0, 0, 0, 0.1);" href="{{ route('subcategory-registro') }}">
                                                <i class="material-icons">add</i>
                                                <span class="align-middle">Registrar</span>
                                            </a>
                                        </div>                                                         
                                    @endif
                                    @error('subcategory_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>                    
                            </div>                                                                                                                                                                                                                                     
                            <button type="button" wire:click="goBack()" class="btn bg-gradient-dark">Cancelar</button>
                            <button type="submit" class="btn btn-success">
                                <i class="material-icons align-middle">add</i>
                                <span class="align-middle">Registrar</span>
                            </button>
                        </form>
                    </div>             
                    <div class="card">
                        <h1 class="text-2xl font-bold text-leaf m-6 text-center">Detalle Producto</h1>
                        <div class="table-responsive p-0">
                            <table class="table table-striped mb-4">
                                <thead class="bg-blue-700 text-black">
                                    <tr>
                                        <th scope="col">Marca</th>
                                        <th scope="col">Colors</th>
                                        <th scope="col">Tamaño</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @for ($i = $detalleProductoIndex; $i >= 0; $i--)
                                        <tr>
                                            <td class="">
                                                <select wire:model="detailProducts.{{ $i }}.brand_id" class="form-control">
                                                    <option value="">Seleccionar Marca</option>
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="">
                                                <select wire:model="detailProducts.{{ $i }}.color_id" class="form-control">
                                                    <option value="">Seleccionar Tamaño</option>
                                                    @foreach ($colors as $color)
                                                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="">
                                                <select wire:model="detailProducts.{{ $i }}.size_id" class="form-control">
                                                    <option value="">Seleccionar Tamaño</option>
                                                    @foreach ($sizes as $size)
                                                        <option value="{{ $size->id }}">{{ $size->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="">
                                                <input type="number" wire:model="detailProducts.{{ $i }}.quantity" class="form-control" min="0">
                                            </td>
                                            <td class="">
                                                <input type="number" wire:model="detailProducts.{{ $i }}.price" class="form-control" min="0">
                                            </td>
                                            <td class="">
                                                <button wire:click="removeDetalleProducto({{ $i }})" class="btn btn-danger">Eliminar</button>
                                            </td>
                                        </tr>
                                    @endfor                                             
                                </tbody>
                            </table>
                            <div class="px-6 py-4">
                                <button wire:click="addDetalleProducto" class="btn btn-primary">Agregar Detalle</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <head>    
            <style>
                .input-group-append {
                  position: relative;
                  bottom: 0.125rem;
                }          
                .btn-group .btn {
                  border-radius: 0;
                }
              </style>      
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        </head> 
        <script>
            function submitAndRedirect(event) {
              event.preventDefault(); 
              var button = event.target;
              button.style.opacity = 0.5; 
              button.disabled = true; 
              var message = document.createElement("span"); 
              message.innerText = "¡Registro exitoso!";
              button.parentNode.appendChild(message);
              setTimeout(function() {
                window.location.href = "{{ route('dashboard') }}";
            }, 600);
            }
        </script>
        </div>
    </div>
    