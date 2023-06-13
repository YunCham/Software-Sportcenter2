<div>
    <div class="container-fluid px-4 py-4">
        <div class="card card-body mx-auto mt-4" style="max-width: 800px;">
            <div class="card-header bg-gradient-dark text-white">
                <h4 class="mb-0">Registro de Producto</h4>
            </div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form wire:submit.prevent='storeProducto'>
                    <div class="mb-3">
                        <label class="form-label">Marca</label>
                        <select name="tipo_id" class="form-control p-3 border border-primary rounded" wire:model="marca_id">
                            <option value="">Seleccionar Marca</option>
                            @foreach ($marcas as $marca)
                                <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                            @endforeach
                        </select>
                        @error('marca_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Categoria</label>
                        <select name="tipo_id" class="form-control p-3 border border-primary rounded" wire:model="categoria_id">
                            <option value="">Seleccionar Categoria</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                        @error('categoria_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Stock</label>
                        <input wire:model="stock" name="stock" type="number" class="form-control p-3 border border-primary rounded">
                        @error('stock')
                            <small class='text-danger'>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripción</label>
                        <textarea wire:model="descripcion" class="form-control p-3 border border-primary rounded" placeholder="Escribe aquí todo acerca del producto..." rows="4"></textarea>
                        @error('descripcion')
                            <small class='text-danger'>{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="button" wire:click="goBack()" class="btn bg-gradient-dark">Volver</button>
                    <button type="submit" class="btn bg-gradient-dark">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
