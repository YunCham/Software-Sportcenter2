<div class="container">
    <div class="bg-white rounded-lg shadow-lg mb-6 px-6 py-2 flex justify-between items-center">
        <h1 class="font-semibold text-gray-700 uppercase">{{$category->name}}</h1>
        <div class="hidden md:block grid grid-cols-2 border border-gray-200 divide-x divide-gray-200 text-gray-500">
            <i class="fas fa-border-all p-3 cursor-pointer {{ $view == 'grid' ? 'text-orange-500' : ''}}" wire:click="$set('view', 'grid')"></i>
            <i class="fas fa-th-list p-3 cursor-pointer {{ $view == 'list' ? 'text-orange-500' : ''}}" wire:click="$set('view', 'list')"></i>
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
        <aside>
            <h2 class="font-semibold text-center mb-2">Subcategorías</h2>
            <ul class="list-group divide-y divide-gray-200">
                @foreach ($category->subcategories as $subcategory)
                    <li class="list-group-item py-2">
                        <a class="cursor-pointer hover:text-orange-500 capitalize {{ $subcategoria == $subcategory->slug ? 'text-orange-500 font-semibold' : '' }}"
                            wire:click="$set('subcategoria', '{{$subcategory->slug}}')"
                        >{{$subcategory->name}}
                        </a>
                    </li>
                @endforeach
            </ul>
            <h2 class="font-semibold text-center mt-4 mb-2">Marcas</h2>
            <ul class="list-group divide-y divide-gray-200">
                @foreach ($category->brands as $brand)
                    <li class="list-group-item py-2">
                        <a class="cursor-pointer hover:text-orange-500 capitalize {{ $marca == $brand->name ? 'text-orange-500 font-semibold' : ''}}"
                            wire:click="$set('marca', '{{$brand->name}}')"
                        >
                            {{$brand->name}}
                        </a>
                    </li>
                @endforeach
            </ul>
            <button class="btn btn-primary mt-4" wire:click="limpiar">Eliminar filtros</button>
        </aside>
        <div class="md:col-span-2 lg:col-span-4">
            @if ($view == 'grid')
                <div class="row">
                    @forelse ($products as $product)
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card">
                                <img class="card-img-top" src="{{ Storage::url($product->images->first()->url) }}" alt="">
                                <div class="card-body">
                                    <h5 class="card-title">{{Str::limit($product->name, 20)}}</h5>
                                    <p class="card-text font-weight-bold">US$ {{$product->price}}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-danger" role="alert">
                                <strong>Upss!</strong> No existe ningún producto con ese filtro.
                            </div>
                        </div>
                    @endforelse
                </div>
            @else
                <ul class="list-group">
                    @forelse ($products as $product)
                        <li class="list-group-item">
                            <x-product-list :product="$product" />
                        </li>
                    @empty
                        <li class="list-group-item">
                            <div class="alert alert-danger" role="alert">
                                <strong>Upss!</strong> No existe ningún producto con ese filtro.
                            </div>
                        </li>
                    @endforelse
                </ul>
            @endif
            <div class="mt-4">
                {{$products->links()}}
            </div>
        </div>
    </div>
</div>
