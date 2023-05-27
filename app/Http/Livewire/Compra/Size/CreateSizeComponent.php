<?php

namespace App\Http\Livewire\Compra\Size;

use App\Models\Size;
use Livewire\Component;
use Illuminate\Support\Str;

class CreateSizeComponent extends Component
{
    public $name, $sizeId, $slug, $titulo = 'Datos del Tamaño que pertenecera a Producto';

    public function updated($fields){
        $this->validateOnly($fields, [
            'name' => 'required',
        ]);      
    }
    
    public function submitForm()
    {
        $sizeId = Size::all();
        $validatedData = $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:sizes,slug',
        ]);
        $size = new Size();
        $size->name = $validatedData['name'];
        $size->slug = $validatedData['slug'];
        $size->save();
        session()->flash('message', 'Nuevo Tamaño registrado!');
        return redirect()->route('size.index');
    }

    public function filterSpecialCharacters()
    {
        $this->name = preg_replace('/[^\p{L}\p{N}\s]/u', '', $this->name);
    }

    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }

    public function goBack()
    {
        $this->redirect(route('size.index'));
    }

    public function render()
    {
        return view('livewire.compra.size.create-edit-size-component');
    }
}
