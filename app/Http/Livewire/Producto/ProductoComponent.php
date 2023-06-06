<?php

namespace App\Http\Livewire\Producto;

use App\Models\Producto;
use Livewire\Component;
use Livewire\WithPagination;
class ProductoComponent extends Component
{
    use WithPagination;

    public function deleteProducto($producto_id){
        $membresia = Producto::find($producto_id);
        $membresia->delete();

    }
    public function render()
    {   
        $productos = Producto::orderBy('descripcion', 'ASC')->paginate(5);
        return view('livewire.producto.producto-component',['productos' => $productos]);
    }
}
