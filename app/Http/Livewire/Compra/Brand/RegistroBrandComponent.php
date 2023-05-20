<?php

namespace App\Http\Livewire\Compra\Brand;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithFileUploads;

class RegistroBrandComponent extends Component
{
    use WithFileUploads;
    public $name;

    public function updated($fields){
        $this->validateOnly($fields, [
            'name' => 'required',
        ]);      
    }
    
    public function storeBrand()
    {
        $this->validate([
           'name' => 'required',
        ]);
        $brand = new Brand();
        $brand->name = $this->name;
        $brand->save();
        session()->flash('message', 'Nueva Marca registrado!');
        return redirect()->route('marca.index');
    }

    public function goBack()
    {
        $this->redirect(route('marca.index'));
    }

    public function render()
    {
        return view('livewire.compra.brand.registro-brand-component');
    }
}
