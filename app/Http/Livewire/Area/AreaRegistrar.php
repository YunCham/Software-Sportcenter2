<?php

namespace App\Http\Livewire\Area;

use App\Models\area;
use Livewire\Component;
use Livewire\WithFileUploads;

class AreaRegistrar extends Component
{
    use WithFileUploads;
    public $name;
    public $descripcion;
    public $estado;
    public $tipo;

    public function updated($fields){
        $this->validateOnly($fields, [
            'name' => 'required',
            'descripcion' => 'required',
            'estado' => 'required',
            'tipo' => 'required',
        ]);
        
    }

    public function storeArea()
    {
    $this->validate([
            'name' => 'required',
            'descripcion' => 'required',
            'estado' => 'required',
            'tipo' => 'required',
    ]);

    $area = new area();
    $area->name = $this->name;
    $area->descripcion = $this->descripcion;
    $area->estado = $this->estado;
    $area->tipo = $this->tipo;
    $area->save();
    return redirect(route('area.index'))->with('status', 'Nuevo area registrado!');

    }
    /*
    $this->validate([
        'name' => 'required',
        'email' => 'required|email|unique:proveedors',
        'phone' => 'required',
        'about' => 'required|max:100',
        'location' => 'required',
        'tipo_proveedor' => 'required',
    ]);
  
    $proveedor = new proveedor();
    $proveedor->name = $this->name;
    $proveedor->email = $this->email;
    $proveedor->phone = $this->phone;
    $proveedor->about = $this->about;
    $proveedor->location = $this->location;
    $proveedor->tipo_proveedor = $this->tipo_proveedor;
    $proveedor->save();
    return redirect(route('proveedor.index'))->with('status', 'Nuevo PROVEEDPR registrado!');
    */
    public function goBack()
    {
      // Lógica adicional si es necesario
      $this->redirect(route('area.index'));
    }


    public function render()
    {
        return view('livewire.area.area-registrar');
    }
}
