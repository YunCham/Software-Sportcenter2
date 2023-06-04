<div>
    <div class="col-span-6 sm:col-span-4">
        <label for="name">Nombre</label>
        <input wire:model="createForm.name" type="text" id="name" class="w-full mt-1" />
        @error('createForm.name') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>
    <div class="col-span-6 sm:col-span-4">
        <label for="slug">Slug</label>
        <input disabled wire:model="createForm.slug" type="text" id="slug" class="w-full mt-1 bg-gray-100" />
        @error('createForm.slug') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>
    <div class="col-span-6 sm:col-span-4">
        <label for="icon">Ícono</label>
        <input wire:model.defer="createForm.icon" type="text" id="icon" class="w-full mt-1" />
        @error('createForm.icon') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>
    <div class="col-span-6 sm:col-span-4">
        <label>Marcas</label>
        <div class="grid grid-cols-4">
            @foreach ($brands as $brand)                        
                <label>
                    <input wire:model.defer="createForm.brands" name="brands[]" value="{{$brand->id}}" type="checkbox" />
                    {{$brand->name}}
                </label>
            @endforeach
        </div>
        @error('createForm.brands') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>
    <div class="col-span-6 sm:col-span-4">
        <label for="image">Imagen</label>
        <input wire:model="createForm.image" accept="image/*" type="file" class="mt-1" id="image" />
        @error('createForm.image') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>
</div>
<div>
    <table class="text-gray-600">
        <thead class="border-b border-gray-300">
            <tr class="text-left">
                <th class="py-2 w-full">Nombre</th>
                <th class="py-2">Acción</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-300">
            @foreach ($categories as $category)
                <tr>
                    <td class="py-2">
                        <span class="inline-block w-8 text-center mr-2">
                            {!!$category->icon!!}
                        </span>
                        <a href="{{route('admin.categories.show', $category)}}" class="uppercase underline hover:text-blue-600">
                            {{$category->name}}
                        </a>
                    </td>
                    <td class="py-2">
                        <div class="flex divide-x divide-gray-300 font-semibold">
                            <a class="pr-2 hover:text-blue-600 cursor-pointer" wire:click="edit('{{$category->slug}}')">Editar</a>
                            <a class="pl-2 hover:text-red-600 cursor-pointer" wire:click="$emit('deleteCategory', '{{$category->slug}}')">Eliminar</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
