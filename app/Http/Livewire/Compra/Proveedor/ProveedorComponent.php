<?php

namespace App\Http\Livewire\Compra\Proveedor;

use App\Models\Proveedor;
use Livewire\Component;

class ProveedorComponent extends Component
{
  public function deleteProveedor($personal_id)
  {
    $personal = proveedor::find($personal_id);
    $personal->delete();
    session()->flash('message','Registro elimidado exitosamente!');
  }

    public function render()
    {
        $personales = proveedor::orderBy('id', 'ASC')->paginate(15);
        return view('livewire.compra.proveedor.proveedor-component' , ['proveedors' => $personales]);
    }
}
