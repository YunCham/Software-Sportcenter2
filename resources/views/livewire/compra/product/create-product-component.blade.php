<!-- resources/views/livewire/compra/product/create-product-component.blade.php -->

<div>
    <form wire:submit.prevent="saveProduct" class="form">
        <div class="form-group">
            <label for="name">Nombre</label>
            <input wire:model="name" type="text" id="name" class="form-control">
            @error('name') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="slug">Slug</label>
            <input wire:model="slug" type="text" id="slug" class="form-control">
            @error('slug') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="quantity">Cantidad</label>
            <input wire:model="quantity" type="number" id="quantity" class="form-control">
            @error('quantity') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="price">Precio</label>
            <input wire:model="price" type="number" step="0.01" id="price" class="form-control">
            @error('price') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="category">Categoría</label>
            <select wire:model="category" id="category" class="form-control">
                <option value="">Seleccione una categoría</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="subcategory">Subcategoría</label>
            <select wire:model="subcategory" id="subcategory" class="form-control">
                <option value="">Seleccione una subcategoría</option>
                @foreach ($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                @endforeach
            </select>
            @error('subcategory') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="brand">Marca</label>
            <select wire:model="brand" id="brand" class="form-control">
                <option value="">Seleccione una marca</option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>
            @error('brand') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="colors">Colores</label>
            <select wire:model="colors" id="colors" class="form-control" multiple>
                @foreach ($colors as $color)
                    <option value="{{ $color->id }}">{{ $color->name }}</option>
                @endforeach
            </select>
            @error('colors') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="sizes">Tallas</label>
            <select wire:model="sizes" id="sizes" class="form-control" multiple>
                @foreach ($sizes as $size)
                    <option value="{{ $size->id }}">{{ $size->name }}</option>
                @endforeach
            </select>
            @error('sizes') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="status">Estado</label>
            <select wire:model="status" id="status" class="form-control">
                <option value="{{ App\Models\Product::BORRADOR }}">Borrador</option>
                <option value="{{ App\Models\Product::PUBLICADO }}">Publicado</option>
            </select>
            @error('status') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="image">Imagen</label>
            <input wire:model="image" type="file" id="image" class="form-control">
            @error('image') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>

