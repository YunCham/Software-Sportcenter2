<?php

namespace App\Http\Livewire\Compra\Color;

use App\Models\Color;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class EditColorComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $color_id;
    public $name;

    public function mount($color_id)
    {
        $colors = Color::find($color_id);
        $this->color_id = $colors->id;
        $this->name = $colors->name;
    }

    public function updated($fields)
    {
         $this->validateOnly($fields, [
            'name' => 'required'
        ]);
    }
    
    public function goBack()
    {
        $this->redirect(route('color.index'));
    }
    
    public function submitForm()
    {
        $this->validate([
            'name' => 'required',
        ]);
        $color = Color::find($this->color_id);
        $color->name = $this->name;
        $color->save();
        session()->flash('message', 'Nueva Marca registrado!');
        return redirect()->route('color.index');
    }

    public function render()
    {
        return view('livewire.compra.color.create-edit-color-component');
    }
}