<?php

namespace App\Http\Livewire\NotaCompra;

use App\Models\NotaCompra;
use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditarNotaCompraComponent extends Component
{
    public $nota_compra_id;
    public $fecha_hora;
    public $total;
    public $proveedor_id;
    public $user_id;

    public $selectedProductos = [];
    public $cantidad = [];

    public function mount($nota_compra_id)
    {
        $compra = NotaCompra::find($nota_compra_id);
        $this->nota_compra_id = $compra->id;
        $this->fecha_hora = $compra->fecha_hora;
        $this->total = $compra->total;
        $this->proveedor_id = $compra->proveedor_id;
        $this->user_id = $compra->user_id;
    
        //array_fill_key es importante y algo clave con el true tambien
        $this->selectedProductos = array_fill_keys($compra->productos->pluck('id')->toArray(), true);

        $this->cantidad = [];
    
        foreach ($compra->productos as $producto) {
            $this->cantidad[$producto->id] = $producto->pivot->cantidad;
        }
    }
    
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'fecha_hora' => 'required',
            'total' => 'required',
            'proveedor_id' => 'required',
            'selectedProductos' => 'required',
            'cantidad' => 'required',

        ]);
    }
    public function updateCompra()
    {
        $this->validate([
            'fecha_hora' => 'required',
            'total' => 'required',
            'proveedor_id' => 'required',
            'selectedProductos' => 'required',
            'cantidad' => 'required',

        ]);

        $nota_compra = NotaCompra::find($this->nota_compra_id);
        $nota_compra->fecha_hora = $this->fecha_hora;
        $nota_compra->total = $this->total;
        $nota_compra->proveedor_id = $this->proveedor_id;
        $nota_compra->user_id = Auth::id();
        $nota_compra->save();

        $productosCantidad = [];
        foreach ($this->selectedProductos as $productoId => $selected) {
            if ($selected) {
                $cantidad = $this->cantidad[$productoId];
                $productosCantidad[$productoId] = ['cantidad' => $cantidad];
            }
        }

        $nota_compra->productos()->sync($productosCantidad);
        return redirect(route('nota_compra.index'))->with('status', 'Datos actualizados!');
    }
    //función para retroceder
    public function goBack()
    {
        // Lógica adicional si es necesario
        $this->redirect(route('nota_compra.index'));
    }
    public function render()
    {
        $productos = Producto::all();
        $proveedores = Proveedor::all();
        return view('livewire.nota-compra.editar-nota-compra-component',compact('productos','proveedores'));
    }
}
