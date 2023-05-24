<div>
    <form wire:submit.prevent="submit">
        <div>
            <label for="name">Nombre:</label>
            <input type="text" wire:model="name" id="name">
            @error('name') <span>{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="slug">Slug:</label>
            <input type="text" wire:model="slug" id="slug">
            @error('slug') <span>{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="quantity">Cantidad:</label>
            <input type="number" wire:model="quantity" id="quantity">
            @error('quantity') <span>{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="price">Precio:</label>
            <input type="text" wire:model="price" id="price">
            @error('price') <span>{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="selectedColors">Colores:</label>
            <select multiple wire:model="selectedColors" id="selectedColors">
                @foreach ($colors as $color)
                    <option value="{{ $color->id }}">{{ $color->name }}</option>
                @endforeach
            </select>
            @error('selectedColors') <span>{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="selectedSizes">Tamaños:</label>
            <select multiple wire:model="selectedSizes" id="selectedSizes">
                @foreach ($sizes as $size)
                    <option value="{{ $size->id }}">{{ $size->name }}</option>
                @endforeach
            </select>
            @error('selectedSizes') <span>{{ $message }}</span> @enderror
        </div>

        <button type="submit">Guardar</button>
    </form>
</div>
