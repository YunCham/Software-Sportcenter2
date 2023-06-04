<?php

namespace App\Http\Livewire\Inventario;

use App\Models\inventario;
use Livewire\Component;

class InventarioComponent extends Component
{
    public function render()
    {
        $producto = inventario::orderBy('nombre', 'ASC')->paginate(5);
        return view('livewire.inventario.inventario-component', ['productos' => $producto]);
    }
}
