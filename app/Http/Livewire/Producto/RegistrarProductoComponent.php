<?php

namespace App\Http\Livewire\Producto;

use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Producto;
use Livewire\Component;

class RegistrarProductoComponent extends Component
{
    
    public $descripcion;
    public $precio;
    public $marca_id;
    public $categoria_id;

    public function storeProducto()
    {
        $this->validate([
            'descripcion' => 'required',
            'precio' => 'required',
            'marca_id' => 'required',
            'categoria_id' => 'required',
        ]);
        $producto = new Producto();
        $producto->descripcion = $this->descripcion;
        $producto->precio = $this->precio;
        $producto->marca_id = $this->marca_id;
        $producto->categoria_id = $this->categoria_id;
        $producto->save();
       // session()->flash('status', 'Nuevo SERVICIO registrado!');
       return redirect(route('producto.index'))->with('status', 'Nuevo PRODUCTO registrado!');
    }
    //función para retroceder
    public function goBack()
    {
        // Lógica adicional si es necesario
        $this->redirect(route('producto.index'));
    }
    public function render()
    {   
        $marcas = Marca::all();
        $categorias = Categoria::all();
        return view('livewire.producto.registrar-producto-component', compact('marcas','categorias'));
    }
}
