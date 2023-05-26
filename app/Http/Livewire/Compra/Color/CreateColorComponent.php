<?php

namespace App\Http\Livewire\Compra\Color;

use App\Models\Color;
use Livewire\Component;

class CreateColorComponent extends Component
{
    public $name;

    public function updated($fields){
        $this->validateOnly($fields, [
            'name' => 'required',
        ]);      
    }
    
    public function submitForm()
    {
        $validatedData = $this->validate([
            'name' => 'required',
         ]);
        $color = new Color();
        $color->name = $validatedData['name'];
        $color->save();
        session()->flash('message', 'Nuevo Color registrado!');
        return redirect()->route('color.index');
    }

    public function goBack()
    {
        $this->redirect(route('color.index'));
    }

    public function render()
    {
        return view('livewire.compra.color.create-edit-color-component');
    }
}
