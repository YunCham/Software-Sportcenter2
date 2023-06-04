<?php

namespace App\Http\Livewire\Proveedor;

use App\Models\proveedor;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class EditarProveedorComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $proveedor_id;
    public $name;
    public $email;
    public $phone;
    public $about;
    public $location;
    public $tipo_proveedor;

    public function mount($proveedor_id)
    {
    $proveedor = proveedor::find($proveedor_id);
    $this->proveedor_id = $proveedor->id;
    $this->name = $proveedor->name;
    $this->phone = $proveedor->phone;
    $this->location = $proveedor->location;
    $this->email = $proveedor->email;
    $this->about = $proveedor->about;
    $this->tipo_proveedor = $proveedor->tipo_proveedor;
    
    }
    public function updated($fields)
    {
    $this->validateOnly($fields, [
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'about' => 'required|max:100',
        'location' => 'required',
        'tipo_proveedor' => 'required'
    ]);
    }

    
  //implementacio de la funcion donde Edita los datos
  public function updateProveedor()
  {
    $this->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'about' => 'required|max:100',
        'location' => 'required',
        'tipo_proveedor' => 'required',
    ]);
    $proveedor = proveedor::find($this->proveedor_id);
    $proveedor->name = $this->name;
    $proveedor->email = $this->email;
    $proveedor->phone = $this->phone;
    $proveedor->about = $this->about;
    $proveedor->location = $this->location;
    $proveedor->tipo_proveedor = $this->tipo_proveedor;
    $proveedor->save();
    return redirect(route('proveedor.index'))->with('status', 'Datos actualizados!');
  }

    public function goBack()
    {
       // Lógica adicional si es necesario
       $this->redirect(route('proveedor.index'));
    }
    public function render()
    {
        return view('livewire.proveedor.editar-proveedor-component');
    }
}
