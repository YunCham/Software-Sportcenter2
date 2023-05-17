<?php

namespace App\Http\Livewire\Proveedor;

use App\Models\proveedor;
use Livewire\Component;
use Livewire\WithFileUploads;

class RegistroProveedorComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $email;
    public $phone;
    public $about;
    public $location;
    public $tipo_proveedor;

    public function updated($fields){
        $this->validateOnly($fields, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'about' => 'required|max:100',
            'location' => 'required',
            'tipo_proveedor' => 'required',
            
        ]);
        
    }
    public function storeProveedor()
    {
    $this->validate([
        'name' => 'required',
        'email' => 'required|email',
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
    session()->flash('message', 'Nuevo Personal registrado!');
    }

  public function goBack()
  {
      // Lógica adicional si es necesario
      $this->redirect(route('proveedor.index'));
  }
  public function render()
  {
      return view('livewire.proveedor.registro-proveedor-component');
  }
}
