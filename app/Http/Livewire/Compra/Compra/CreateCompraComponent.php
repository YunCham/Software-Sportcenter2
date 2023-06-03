<?php

namespace App\Http\Livewire\Compra\Compra;

use App\Models\Compra;
use App\Models\DetalleCompra;
use App\Models\Product;
use App\Models\Proveedor;
use Livewire\Component;

class CreateCompraComponent extends Component
{
    public $products = [];
    public $producto = [];
    public $lista_productos = [];
    public $proveedores, $product_id;
    public $lista_productos_id = [];

    public function mount()
    {
        $this->proveedores = Proveedor::all();
        $this->products = Product::all();
    }

    public function submitForm() {

    }

    public function render()
    {
        return view('livewire.compra.compra.create-compra-component');
    }
}
