<?php

namespace App\Http\Livewire\Compra\Size;

use App\Models\Size;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class EditSizeComponent extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $name, $size_id;

    public function goBack()
    {
        return redirect()->route('size.index');
    }

    public function mount($size_id)
    {
        $sizes = Size::find($size_id);
        $this->size_id = $sizes->id;
        $this->name = $sizes->name;
    }
            
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required|unique:sizes,name,'.$this->size_id,          
        ]);        
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido.',
            'name.unique' => 'El nombre ya está en uso.',
        ];
    }

    public function filterSpecialCharacters()
    {
        $this->name = preg_replace('/[^\p{L}\p{N}\s]/u', '', $this->name);
    }

    public function submitForm()
    {
        $size = Size::find($this->size_id);
        $size->name = $this->name;
        $size->save();
        session()->flash('message', 'Editar Tamaño registrada!');
        return redirect()->route('size.index');
    }

    public function render()
    {
        return view('livewire.compra.size.create-edit-size-component');
    }
}
