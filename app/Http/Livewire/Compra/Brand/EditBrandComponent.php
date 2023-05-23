<?php

namespace App\Http\Livewire\Compra\Brand;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class EditBrandComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $marca_id;
    public $name;
    public $slug;

    public function mount($marca_id)
    {
        $marcas = Brand::find($marca_id);
        $this->marca_id = $marcas->id;
        $this->name = $marcas->name;
        $this->slug = $marcas->slug;
    }

    public function updated($fields)
    {
         $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required|unique:brands,slug,'.$this->marca_id,
        ]);
    }
    
    public function goBack()
    {
        $this->redirect(route('marca.index'));
    }
    
    public function filterSpecialCharacters()
    {
        $this->name = preg_replace('/[^\p{L}\p{N}\s]/u', '', $this->name);
    }
    
    public function submitForm()
    {
        $this->validate([
            'name' => 'required',
            'slug.required' => 'El slug es requerido.',
            'slug.unique' => 'El slug ya está en uso.',
        ]);
        $brand = Brand::find($this->marca_id);
        $brand->name = $this->name;
        $brand->slug = $this->slug;
        $brand->save();
        session()->flash('message', 'Nueva Marca registrado!');
        return redirect()->route('marca.index');
    }
    
    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }
    
    public function render()
    {
        return view('livewire.compra.brand.create-edit-brand-component');
    }
}
