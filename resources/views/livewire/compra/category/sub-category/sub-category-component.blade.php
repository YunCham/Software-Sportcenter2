<div>
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Historial de la Sub Categoria</h6>
                    </div>
                    {{-- boton añadir --}}
                    <div class="d-flex justify-content-center align-items-center your-element">
                        <div class="me-3 my-3 text-end">    
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="me-3 my-3 text-end">
                                    <a class="btn btn-info" style="margin-right: 0.5cm; border: 2px solid #555;  border-radius: 10px; padding: 10px 20px; font-weight: bold; transition: box-shadow 0.3s;  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);" href="{{ route('subcategory-registro') }}">
                                        <i class="material-icons align-middle">add</i>
                                        <span class="align-middle">Crear SubCategoria</span>
                                    </a>
                                    <a class="btn btn-success" style="border: 2px solid #555; border-radius: 10px; padding: 10px 20px; font-weight: bold; transition: box-shadow 0.3s; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);" href="{{ route('categoria-registro') }}">
                                        <i class="material-icons align-middle">add</i>
                                        <span class="align-middle">Crear Categoría</span>
                                    </a>                                                                           
                                </div>
                            </div>                            
                        </div>
                    </div>                                                                                              
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nombre de la Categoria</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subcategories as $subcategory)
                                    <tr>
                                        <td class="mb-2 col-md-5">
                                            <div class="mb-2 col-md-4">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $subcategory->name }}</h6>
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
                                            <a href="{{ route('subcategory-editar', ['category_id' => $subcategory->id]) }}"
                                                class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                data-original-title="Edit user">
                                                Editar
                                            </a>
                                        </td>
                                        <td class="align-middle">
                                          <a href="#" class="text-secondary font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Eliminar"
                                                data-bs-toggle="modal" data-bs-target="#modal-notification-{{ $subcategory->id }}">
                                                Eliminar
                                          </a>
                                            <div class="modal fade" id="modal-notification-{{ $subcategory->id }}" tabindex="-1"
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
                                                                    Eliminar Marca
                                                                </i>
                                                                <h4 class="text-gradient text-danger mt-4">¿Estás
                                                                    seguro?</h4>
                                                                <p>Paso a Paso</p>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button"
                                                                class="btn btn-primary btn-sm"
                                                                wire:click="deleteCategoria({{ $subcategory->id }})">Eliminar
                                                                Marca</button>
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
                        {{ $subcategories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <style>
          @keyframes shadow-animation {
            0% {
              box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.5);
            }
            50% {
              box-shadow: 0px 0px 50px 10px rgba(0, 0, 0, 0.8);
            }
            100% {
              box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.5);
            }
          }
      
          .your-element {
            animation: shadow-animation 5s infinite;
            background-color: #f1f8e9; /* Color más claro */
            border: none; /* Sin bordes */
            padding: 10px; /* Ajusta el espaciado interno según sea necesario */
            border-radius: 8px; /* Ajusta el radio del borde si deseas bordes redondeados */
            cursor: pointer; /* Cambia el cursor al pasar por encima */
          }
        </style>
      </head>
      <body>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
      </body>      
    </div>
  </div>
  