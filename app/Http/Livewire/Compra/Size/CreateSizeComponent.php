<?php

namespace App\Http\Livewire\Compra\Size;

use App\Models\Size;
use Livewire\Component;

class CreateSizeComponent extends Component
{
    public $name, $sizeId;

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
        ]);
        $size = new Size();
        $size->name = $validatedData['name'];
        $size->save();
        session()->flash('message', 'Nuevo Tamaño registrado!');
        return redirect()->route('size.index');
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
