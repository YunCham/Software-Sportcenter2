<?php

namespace App\Http\Livewire\NotaCompra;
use Illuminate\Support\Facades\Auth;
use App\Models\NotaCompra;
use App\Models\Producto;
use App\Models\Proveedor;
use Livewire\Component;

class RegistrarNotaCompraComponent extends Component
{


    public $fecha_hora;
    public $total;
    public $proveedor_id;
    public $user_id;

    public $selectedProductos = [];
    public $cantidad = [];


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

    public function storeCompra()
    {
        $this->validate([
            'fecha_hora' => 'required',
            'total' => 'required',
            'proveedor_id' => 'required',
            'selectedProductos' => 'required',
            'cantidad' => 'required',

        ]);

        $nota_compra = new NotaCompra();
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
        return redirect(route('nota_compra.index'))->with('status', 'Nueva COMPRA registrada!');

        //  session()->flash('status', 'Nueva MEMBRESIA registrada!');
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
        return view('livewire.nota-compra.registrar-nota-compra-component', compact('productos', 'proveedores'));
    }
}
