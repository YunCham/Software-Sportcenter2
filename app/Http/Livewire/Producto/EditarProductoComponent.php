<?php

namespace App\Http\Livewire\Producto;

use App\Models\Categoria;
use App\Models\Marca;
use Livewire\Component;
use App\Models\Producto;
class EditarProductoComponent extends Component
{
    public $producto_id, $descripcion, $stock, $marca_id, $categoria_id;

    protected $rules = [
        'descripcion' => 'required|max:255',
        'stock' => 'required|integer',
        'marca_id' => 'required|exists:marcas,id',
        'categoria_id' => 'required|exists:categorias,id',
    ];

    public function mount($producto_id)
    {

         $producto = Producto::find($producto_id);
        $this->producto_id = $producto->id;
        $this->descripcion = $producto->descripcion;
        $this->stock = $producto->stock;
        $this->marca_id = $producto->marca_id;
        $this->categoria_id = $producto->categoria_id;
    }
    public function updateProducto()
    {
        $this->validate();

        $producto = Producto::find($this->producto_id);
        $producto->descripcion = $this->descripcion;
        $producto->stock = $this->stock;
        $producto->marca_id = $this->marca_id;
        $producto->categoria_id = $this->categoria_id;
        $producto->save();
        return redirect(route('producto.index'))->with('status', 'Datos actualizados!');
      //  session()->flash('status', 'Producto actualizado exitosamente!');
        
       // $this->reset(['descripcion', 'stock', 'marca_id', 'categoria_id']);
    }

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
