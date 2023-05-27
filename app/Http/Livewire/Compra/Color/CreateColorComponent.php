<?php

namespace App\Http\Livewire\Compra\Color;

use App\Models\Color;
use Livewire\Component;
use Illuminate\Support\Str;

class CreateColorComponent extends Component
{
    public $name, $slug, $titulo = 'Registrar nuevo Color';

    public function updated($fields){
        $this->validateOnly($fields, [
            'name' => 'required',
        ]);      
    }
    
    public function submitForm()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:colors,slug',
         ]);
        $color = new Color();
        $color->name = $validatedData['name'];
        $color->slug = $validatedData['slug'];
        $color->save();
        session()->flash('message', 'Nuevo Color registrado!');
        return redirect()->route('color.index');
    }

    public function goBack()
    {
        $this->redirect(route('color.index'));
    }

    public function filterSpecialCharacters()
    {
        $this->name = preg_replace('/[^\p{L}\p{N}\s]/u', '', $this->name);
    }

    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }

    public function render()
    {
        return view('livewire.compra.size.create-edit-size-component');
    }
}
