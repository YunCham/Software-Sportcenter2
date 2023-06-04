<?php

namespace App\Http\Livewire\Compra\Brand;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class EditBrandComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $marca_id;
    public $name;

    public function mount($marca_id)
    {
        $marcas = Brand::find($marca_id);
        $this->marca_id = $marcas->id;
        $this->name = $marcas->name;
    }

    public function updated($fields)
    {
         $this->validateOnly($fields, [
            'name' => 'required'
        ]);
    }
    
    public function goBack()
    {
        $this->redirect(route('marca.index'));
    }
    
  public function updateMarcas()
  {
        $this->validate([
        'name' => 'required',
    ]);
    $brand = Brand::find($this->marca_id);
    $brand->name = $this->name;
    $brand->save();
    session()->flash('message', 'Nueva Marca registrado!');
    return redirect()->route('marca.index');
    }

    public function render()
    {
        return view('livewire.compra.brand.edit-brand-component');
    }
}
