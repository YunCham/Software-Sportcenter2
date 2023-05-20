<div class="py-2">
    {{-- Formulario crear --}}
    <h2 class="text-center">Crear nueva Marca</h2>
    <div style="margin-left: 2cm;" class="text-gray-600 mb-3">
        <form wire:submit.prevent="save" class="mb-4" style="width: 686px;">
            <div class="col-span-6 sm:col-span-4">
                <label for="createName" style="font-size: 38px;">Nombre: </label>
                <input id="createName" type="text" wire:model="createForm.name" class="w-full" />
                @error('createForm.name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <button type="submit" style="padding: 10px 20px; font-size: 18px; background-color: #4A90E2; color: #FFFFFF; border: none; border-radius: 4px; cursor: pointer;">Agregar</button>
        </form>
    </div>
    {{-- Lista de marcas --}}
    
    <div class="card-body px-0 pb-2">
        <h2 class="text-center">Lista de marcas</h2>
        <p style="margin-left: 1cm;">Encontrará todas las marcas agregadas</p>
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-lg font-bold opacity-7">
                            Nombre Marca
                        </th>
                        <th class="text-uppercase text-secondary text-lg font-bold opacity-7">
                            Acción
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-300">
                    @foreach ($brands as $brand)
                        <tr>
                            <td class="py-2">
                                <a class="uppercase" style="margin-left: 0.8cm;">
                                    {{$brand->name}}
                                </a>
                            </td>
                            <td class="align-middle">                 
                                <div class="flex divide-x divide-gray-300 font-semibold">
                                    <button class="pr-8 hover:text-blue-600 cursor-pointer" wire:click="edit({{ $brand->id }})">Editar</button>
                                </div>
                            </td>
                            
                            <td class="align-middle">
                                <a href="#" class="text-secondary font-weight-bold text-lg" data-toggle="tooltip" data-original-title="Eliminar"  data-bs-toggle="modal" data-bs-target="#modal-notification-{{ $brand->id }}">
                                    Eliminar 
                                </a>
                                <div class="modal fade" id="modal-notification-{{ $brand->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                                    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
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
                                                      wire:click="delete({{ $brand->id }})">Eliminar
                                                      Marca</button>
                                                <button type="button" class="btn btn-secondary btn-sm"
                                                      data-bs-dismiss="modal">Cancelar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>              
                            <td class="align-middle">
                            </td>
                            <td class="align-middle">
                            </td>
                            <td class="align-middle">
                            </td>
                        </tr>
                        {{-- Modal editar --}}
                        @if ($editForm['open'] && $editForm['brandId'] == $brand->id)
                            <tr>
                                <td colspan="2"  class="d-flex justify-content-center">
                                    <div id="editForm_{{ $brand->id }}">
                                        <h2>Editar Marca</h2>
                                        <label for="editName">Nombre</label>
                                        <input id="editName" type="text" wire:model="editForm.name" class="w-full mt-4"/>
                                        @error('editForm.name') <span class="text-red-500">{{ $message }}</span> @enderror
                                        <div class="mt-4">
                                            <button wire:click="update" type="button" wire:loading.attr="disabled" wire:target="update" class="btn btn-secondary btn-sm">Actualizar</button>
                                            <button wire:click="goBack" type="button" wire:loading.attr="disabled" wire:target="goBack" class="btn btn-primary btn-sm">Cancelar</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        document.addEventListener('livewire:load', function () {
            Livewire.on('editFormOpen', function (brandId) {
                var form = document.getElementById('editForm_' + brandId);
                form.style.display = 'block';
            });
            Livewire.on('editFormClose', function (brandId) {
                var form = document.getElementById('editForm_' + brandId);
                form.style.display = 'none';
            });
        });
    </script>   
</div>
