<div>
    <div class="my-12 bg-white shadow-lg rounded-lg p-6">
        {{-- Color --}}
        <div class="mb-6">
            <x-jet-label>
                Color
            </x-jet-label>
            <div class="grid grid-cols-6 gap-6">
                @foreach ($colors as $color)
                    <label>
                        <input type="radio" name="color_id" wire:model.defer="color_id" value="{{ $color->id }}">
                        <span class="ml-2 text-gray-700 capitalize">
                            {{ __($color->name) }}
                        </span>
                    </label>
                @endforeach
            </div>
        </div>
        {{-- Cantidad --}}
        <div>
            <th>
                Cantidad
            </th>
            <input type="number" wire:model.defer="quantity" placeholder="Ingrese una cantidad" class="w-full" />
        </div>
        <div class="flex justify-end items-center mt-4">
            <label class="mr-3" wire:loading.class.remove="hidden" wire:target="save">
                Agregado
            </label>
            <button wire:click="save" wire:loading.attr="disabled" wire:target="save">
                Agregar
            </button>
        </div>
    </div>
    @if ($product_colors->count()) 
        <div class="bg-white shadow-lg rounded-lg p-6">
            <table>
                <thead>
                    <tr>
                        <th class="px-4 py-2 w-1/3">
                            Color
                        </th>

                        <th class="px-4 py-2 w-1/3">
                            Cantidad
                        </th>
                        <th class="px-4 py-2 w-1/3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product_colors as $product_color)
                        <tr wire:key="product_color-{{ $product_color->pivot->id }}">
                            <td class="capitalize px-4 py-2">
                                {{ __($colors->find($product_color->pivot->color_id)->name) }}
                            </td>
                            <td class="px-4 py-2">
                                {{ $product_color->pivot->quantity }} unidades
                            </td>
                            <td class="px-4 py-2 flex">
                                <button class="ml-auto mr-2" wire:click="edit({{ $product_color->pivot }})" wire:loading.attr="disabled" wire:target="edit({{ $product_color->pivot }})">
                                    Actualizar
                                </button>
                                <danger-button wire:click="delete({{ $product_color->pivot }})">
                                    Eliminar
                                </danger-button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
    <dialog-modal wire:model="open">
        <x-slot name="title">
            Editar colores
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <th>
                    Color
                </th>
                <select class="form-control w-full" wire:model="pivot_color_id">
                    <option value="">Seleccione un color</option>
                    @foreach ($colors as $color)
                        <option value="{{ $color->id }}">{{ ucfirst(__($color->name)) }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <th>
                    Cantidad
                </th>
                <input class="w-full" wire:model="pivot_quantity" type="number" placeholder="Ingrese una cantidad" />
            </div>
        </x-slot>
        <x-slot name="footer">
            <button wire:click="$set('open', false)">
                Cancelar
            </button>
            <button wire:click="update" wire:loading.attr="disabled" wire:target="update">
                Actualizar
            </button>
        </x-slot>
    </dialog-modal>
</div>
