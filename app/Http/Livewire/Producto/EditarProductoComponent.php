<?php

namespace App\Http\Livewire\Producto;

use App\Models\Categoria;
use App\Models\Marca;
use Livewire\Component;
use App\Models\Producto;
class EditarProductoComponent extends Component
{
    

    public $producto_id;
    public $descripcion;
    public $precio;
    public $marca_id;
    public $categoria_id;


    public function mount($producto_id)
    {
        $producto = Producto::find($producto_id);
        $this->producto_id = $producto_id;
        $this->descripcion = $producto->descripcion;
        $this->precio = $producto->precio;
        $this->marca_id = $producto->marca_id;
        $this->categoria_id = $producto->categoria_id;
    }
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'descripcion' => 'required',
            'precio' => 'required',
            'marca_id' => 'required',
            'categoria_id' => 'required',
        ]);
    }
    public function updateProducto()
    {
        $this->validate([
            'descripcion' => 'required',
            'precio' => 'required',
            'marca_id' => 'required',
            'categoria_id' => 'required',
        ]);
        $producto = Producto::find($this->producto_id);
        $producto->descripcion = $this->descripcion;
        $producto->precio = $this->precio;
        $producto->marca_id = $this->marca_id;
        $producto->categoria_id = $this->categoria_id;
        $producto->save();
        return redirect(route('producto.index'))->with('status', 'Datos actualizados!');
        //session()->flash('status', 'Datos actualizados!');
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
        return view('livewire.producto.editar-producto-component',compact('marcas','categorias'));
    }
}
