<?php

namespace App\Http\Livewire\Proveedor;

use App\Models\proveedor;
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
        $personales = proveedor::orderBy('name', 'ASC')->paginate(5);
        return view('livewire.proveedor.proveedor-component' , ['proveedors' => $personales]);
    }
}
