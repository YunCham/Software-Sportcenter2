<div>
    <div class="row">       
        <div class="col-12">          
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Historial de Producto</h6>
                    </div>
                    <div class="me-4 my-5">
                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                            <div class="d-flex"> 
                                <div class="mb-4 col-md-19">
                                    <input type="checkbox" id="checkButton1" class="custom-checkbox" onclick="checkButtonHandler(1)">
                                    <label for="checkButton1" class="custom-checkbox-label">Ver producto</label>
                                </div>
                                <div class="mb-4 col-md-19">
                                    <input type="checkbox" id="checkButton2" class="custom-checkbox" onclick="checkButtonHandler(2)">
                                    <label for="checkButton2" class="custom-checkbox-label">Ver detalles</label>
                                </div>
                            </div>
                            {{-- Boton añadir --}}
                            <div class="mb-4 col-md-2">
                                <a class="btn bg-gradient-dark mb-0" href="{{ route('product-registro') }}">
                                    <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Registrar
                                </a>
                            </div>
                        </div>
                    </div>                
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="productDetailsTable" style="display: none;">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nombre Producto</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Marca</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Tamaño</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Color</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Cantidad</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Precio</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detailproducts as $detailproduct)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $detailproduct->product->name }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $detailproduct->brand->name }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        @foreach ($sizes as $size)
                                            @if ( $detailproduct->size_id == $size->id)
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $size->name }}</h6>
                                                        </div>
                                                    </div>
                                                </td> 
                                                @break                    
                                            @endif
                                        @endforeach
                                        @foreach ($colors as $color)
                                            @if ( $detailproduct->color_id == $color->id)
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $color->name }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                @break                                     
                                            @endif
                                        @endforeach 
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $detailproduct->quantity }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $detailproduct->price }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <a href="{{ route('product-editar', ['detailproduct_id' => $detailproduct->id]) }}"
                                                class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                data-original-title="Edit user">
                                                Editar
                                            </a>
                                        </td>
                                        <td class="align-middle">
                                            <a href="#" class="text-secondary font-weight-bold text-xs"
                                                  data-toggle="tooltip" data-original-title="Eliminar"
                                                  data-bs-toggle="modal" data-bs-target="#modal-notification-{{ $detailproduct->id }}">
                                                  Eliminar
                                            </a>
                                              <div class="modal fade" id="modal-notification-{{ $detailproduct->id }}" tabindex="-1"
                                                  role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                                                  <div class="modal-dialog modal-danger modal-dialog-centered modal-"
                                                      role="document">
                                                      <div class="modal-content">
                                                          <div class="modal-header">
                                                              <h6 class="modal-title font-weight-normal"
                                                                  id="modal-title-notification">Se requiere tu atención!!!</h6>
                                                              <button type="button" class="btn-close"
                                                                  data-bs-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">×</span>
                                                              </button>
                                                          </div>
                                                          <div class="modal-body">
                                                              <div class="py-3 text-center">
                                                                  <i class="material-icons h1 text-secondary">
                                                                      Eliminar Detalle Producto
                                                                  </i>
                                                                  <h4 class="text-gradient text-danger mt-4">¿Estás
                                                                      seguro?</h4>
                                                                  <p>Paso a Paso</p>
                                                              </div>
                                                          </div>
                                                          <div class="modal-footer">
                                                              <button type="button"
                                                                  class="btn btn-primary btn-sm"
                                                                  wire:click="deleteProducto({{ $detailproduct->id }})">Eliminar
                                                                  Detalle Producto</button>
                                                              <button type="button"
                                                                  class="btn btn-secondary btn-sm"
                                                                  data-bs-dismiss="modal">Cancelar</button>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </td>
                                    </tr>     
                                @endforeach
                            </tbody>
                        </table>
                        {{ $detailproducts->links() }}

                        <table class="table align-items-center mb-0" id="productTable" style="display: none;">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nombre Producto</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Categoria</th>                             
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Cantidad</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Detalle</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>                  
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $product->name }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $product->subcategory->name }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $product->quantity }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <a href="" class="btn btn-primary btn-sm">
                                                <i class="material-icons align-middle">visibility</i>
                                                <span class="align-middle">Ver más</span>
                                            </a>
                                        </td> 
                                        <td class="align-middle">
                                            <a href="{{ route('product-editar', ['detailproduct_id' => $product->id]) }}"
                                                class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                data-original-title="Edit user">
                                                Editar
                                            </a>
                                        </td>
                                        <td class="align-middle">
                                            <a href="#" class="text-secondary font-weight-bold text-xs"
                                                  data-toggle="tooltip" data-original-title="Eliminar"
                                                  data-bs-toggle="modal" data-bs-target="#modal-notification-{{ $product->id }}">
                                                  Eliminar
                                            </a>
                                              <div class="modal fade" id="modal-notification-{{ $product->id }}" tabindex="-1"
                                                  role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                                                  <div class="modal-dialog modal-danger modal-dialog-centered modal-"
                                                      role="document">
                                                      <div class="modal-content">
                                                          <div class="modal-header">
                                                              <h6 class="modal-title font-weight-normal"
                                                                  id="modal-title-notification">Se requiere tu
                                                                  atención!!!</h6>
                                                              <button type="button" class="btn-close"
                                                                  data-bs-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">×</span>
                                                              </button>
                                                          </div>
                                                          <div class="modal-body">
                                                              <div class="py-3 text-center">
                                                                  <i class="material-icons h1 text-secondary">
                                                                      Eliminar Producto
                                                                  </i>
                                                                  <h4 class="text-gradient text-danger mt-4">¿Estás
                                                                      seguro?</h4>
                                                                  <p>Paso a Paso</p>
                                                              </div>
                                                          </div>
                                                          <div class="modal-footer">
                                                              <button type="button"
                                                                  class="btn btn-primary btn-sm"
                                                                  wire:click="deleteProductoOriginal({{ $product->id }})">Eliminar
                                                                  Producto</button>
                                                              <button type="button"
                                                                  class="btn btn-secondary btn-sm"
                                                                  data-bs-dismiss="modal">Cancelar</button>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </td>
                                    </tr>                              
                                @endforeach
                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
          <script>
            document.addEventListener("DOMContentLoaded", function() {
                var productTable = document.getElementById("productTable");
                var productDetailsTable = document.getElementById("productDetailsTable");
                // Mostrar la tabla de productos por defecto
                productTable.style.display = "table";
                productDetailsTable.style.display = "none";
            });

            function checkButtonHandler(buttonNumber) {
                var productTable = document.getElementById("productTable");
                var table = document.getElementById("productDetailsTable");
              if (buttonNumber === 1) {
                document.getElementById('checkButton2').checked = false;
                productTable.style.display = "table"; // Mostrar la tabla de productos
                productDetailsTable.style.display = "none"; // Ocultar la tabla de detalles
              } else if (buttonNumber === 2) {
                document.getElementById('checkButton1').checked = false;
                productTable.style.display = "none"; // Ocultar la tabla de productos
                productDetailsTable.style.display = "table"; // Mostrar la tabla de detalles
              } 
            }
          </script>          
    </div>
    <style>
        .custom-checkbox {
          display: none;
        }
        .custom-checkbox-label {
          display: inline-block;
          padding: 10px 20px;
          background-color: #00B894;
          border-radius: 5px;
          cursor: pointer;
          transition: background-color 0.3s ease;
        }
        .custom-checkbox:checked + .custom-checkbox-label {
          background-color: #a0d3ff;
          color: white;
        }
      </style>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  </div>
  