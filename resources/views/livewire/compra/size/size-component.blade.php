<div>
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Historial Tamaño que pertenecera a Producto</h6>
                    </div>
                    {{-- boton añadir --}}
                    <div class="me-3 my-3 text-end">
                        <a class="btn bg-gradient-dark mb-0" href="{{ route('size-registro') }}"><i
                              class="material-icons text-sm">add</i>&nbsp;&nbsp;Registrar</a>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nombre de la Marca</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Fecha Registro</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sizes as $size)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $size->name }}</h6>
                                                </div>
                                            </div>
                                        </td>       
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $size->created_at }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                      <td>
                                          <a href="" class="text-orange-500 hover:text-orange-400 hover:underline ml-2 font-semibold">Ver más</a>
                                      </td>                                
                                      <td class="align-middle">
                                          <a href="{{ route('size-editar', ['size_id' => $size->id]) }}"
                                              class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                              data-original-title="Edit user">
                                              Editar
                                          </a>
                                      </td>
                                      <td class="align-middle">
                                          <a href="#" class="text-secondary font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Eliminar"
                                                data-bs-toggle="modal" data-bs-target="#modal-notification-{{ $size->id }}">
                                                Eliminar
                                          </a>
                                            <div class="modal fade" id="modal-notification-{{ $size->id }}" tabindex="-1"
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
                                                                    Eliminar Tamaño
                                                                </i>
                                                                <h4 class="text-gradient text-danger mt-4">¿Estás
                                                                    seguro?</h4>
                                                                <p>Paso a Paso</p>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button"
                                                                class="btn btn-primary btn-sm"
                                                                wire:click="deleteMarca({{ $size->id }})">Eliminar
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
                        {{ $sizes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  