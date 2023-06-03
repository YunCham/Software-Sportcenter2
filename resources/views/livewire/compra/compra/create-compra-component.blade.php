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
                        <h1 class="mt-5 mb-4 text-center">Crear nueva compra</h1>
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
                            <div class="form-group">
                                <label for="product_id">Seleccione Categoría:</label>
                                <select wire:model="product_id" class="form-control @error('product_id') is-invalid @enderror" id="product_id">
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                                @error('product_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div> 
                        </div>
                    </form>
              </div>
          </div>
      </div>
  </div>
</div>

