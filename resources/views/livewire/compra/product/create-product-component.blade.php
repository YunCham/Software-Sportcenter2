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
                                <div class="col-6">
                                    <div class="form-group">
                                         <label for="quantity">Cantidad Total</label>
                                         <input class="form-control" type="number" name="quantity" value="{{ old('quantity') }}" id="stockInput" oninput="validateNumericInput(this)">
                                         @error ('quantity')
                                           <p style="color: red;">{{ $errors->first('stock') }}</p>
                                         @enderror
                                    </div>
                                </div>                                    
                                <div class="col-6">
                                    <div class="form-group">
                                      <label for="precio">Precio Total</label>
                                      <div class="input-group">
                                        <input class="form-control" type="number" name="price" step="0.1" value="{{ old('price') }}" oninput="updateValue(this)">
                                        <div class="input-group-append">
                                          <button type="button" class="btn btn-outline-secondary" onclick="increaseValue(0.1)">+</button>
                                          <button type="button" class="btn btn-outline-secondary" onclick="decreaseValue(0.1)">-</button>
                                        </div>
                                      </div>
                                      <div class="mt-3">
                                        <p class="mb-2">Opciones de aumento:</p>
                                        <div class="btn-group" role="group" aria-label="Opciones de aumento">
                                          <button type="button" class="btn btn-outline-secondary" onclick="setIncrementAmount(0.1)">0.1</button>
                                          <button type="button" class="btn btn-outline-secondary" onclick="setIncrementAmount(0.5)">0.5</button>
                                          <button type="button" class="btn btn-outline-secondary" onclick="setIncrementAmount(5)">5</button>
                                          <button type="button" class="btn btn-outline-secondary" onclick="setIncrementAmount(10)">10</button>
                                          <button type="button" class="btn btn-outline-secondary" onclick="setIncrementAmount(20)">20</button>
                                          <button type="button" class="btn btn-outline-secondary" onclick="setIncrementAmount(50)">50</button>
                                        </div>
                                      </div>
                                      @error ('price')
                                      <p style="color: red;">{{ $errors->first('price') }}</p>
                                      @enderror
                                    </div>
                                </div>                                                                
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for ="brand">Marcas</label>
                                        <select class="form-control" name="brand_id">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}"> {{ $brand->name }} </option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div> 
                            </div>                                          
                            <button type="button" wire:click="goBack()" class="btn bg-gradient-dark">Cancelar</button>
                            <button type="submit" class="btn btn-success">
                                    <i class="material-icons align-middle">add</i>
                                <span class="align-middle">Registrar</span>
                            </button>
                        </form>
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
            var incrementAmount = 0.1; // Incremento por defecto
          
            function updateValue(input) {
              var currentValue = parseFloat(input.value);
              if (isNaN(currentValue)) {
                currentValue = 0;
              }
              input.dataset.previousValue = currentValue.toFixed(2);
            }
          
            function increaseValue() {
              var input = document.getElementsByName("price")[0];
              var currentValue = parseFloat(input.value);
              var newValue = currentValue + incrementAmount;
              input.value = newValue.toFixed(2);
            }
          
            function decreaseValue() {
              var input = document.getElementsByName("price")[0];
              var currentValue = parseFloat(input.value);
              var newValue = currentValue - incrementAmount;
              input.value = newValue.toFixed(2);
            }
          
            function setIncrementAmount(amount) {
              incrementAmount = amount;
            }

            function validateNumericInput(input) {
                // Remover cualquier carácter que no sea numérico
                input.value = input.value.replace(/\D/g, '');
              }
          </script>
          
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
        </div>
    </div>
    