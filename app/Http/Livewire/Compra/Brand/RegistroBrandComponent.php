<?php

namespace App\Http\Livewire\Compra\Brand;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class RegistroBrandComponent extends Component
{
    public $name, $slug;

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido.',
            'slug.required' => 'El slug es requerido.',
            'slug.unique' => 'El slug ya está en uso.',
        ];
    }
    
    public function filterSpecialCharacters()
    {
        $this->name = preg_replace('/[^\p{L}\p{N}\s]/u', '', $this->name);
    }

    public function storeBrand()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:brands,slug',
        ]);
        $brand = new Brand();
        $brand->name = $validatedData['name'];
        $brand->slug = $validatedData['slug'];
        $brand->save();
        session()->flash('message', 'Nueva Marca registrado!');
        return redirect()->route('marca.index');
    }

    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
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
