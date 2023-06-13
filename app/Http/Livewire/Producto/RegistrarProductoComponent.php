<?php

namespace App\Http\Livewire\Producto;

use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Producto;
use Livewire\Component;

class RegistrarProductoComponent extends Component
{
    
    public $descripcion, $stock, $marca_id, $categoria_id;

    protected $rules = [
        'descripcion' => 'required|max:255',
        'stock' => 'required|integer',
        'marca_id' => 'required|exists:marcas,id',
        'categoria_id' => 'required|exists:categorias,id',
    ];

    public function render()
    {
        $marcas = Marca::all();
        $categorias = Categoria::all();

        return view('livewire.producto.registrar-producto-component', [
            'marcas' => $marcas,
            'categorias' => $categorias,
        ]);
    }

    public function storeProducto()
    {
        $this->validate();

        $producto = new Producto();
        $producto->descripcion = $this->descripcion;
        $producto->stock = $this->stock;
        $producto->marca_id = $this->marca_id;
        $producto->categoria_id = $this->categoria_id;
        $producto->save();
        return redirect(route('producto.index'))->with('status', 'Producto registrado!');
      //  session()->flash('status', 'Producto registrado exitosamente!');
        
      //  $this->reset(['descripcion', 'stock', 'marca_id', 'categoria_id']);
    }

    public function goBack()
    {
      return redirect(route('producto.index'));
    }
}
