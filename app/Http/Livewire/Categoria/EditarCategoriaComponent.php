<?php

namespace App\Http\Livewire\Categoria;

use App\Models\Categoria;
use Livewire\Component;

class EditarCategoriaComponent extends Component
{

    
    public $categoria_id;
    public $nombre;
    public function mount($categoria_id)
    {
        $categoria = Categoria::find($categoria_id);
        $this->categoria_id = $categoria_id;
        $this->nombre = $categoria->nombre;
    }
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'nombre' => 'required',
        ]);
    }
    public function updateCategoria()
    {
        $this->validate([
            'nombre' => 'required',
        ]);
        $categoria= Categoria::find($this->categoria_id);
        $categoria->nombre = $this->nombre;
        $categoria->save();
        //session()->flash('status', 'Datos actualizados!');
        return redirect(route('categoria.index'))->with('status', 'Datos actualizados!');
    }

    //función para retroceder
    public function goBack()
    {
        // Lógica adicional si es necesario
        $this->redirect(route('categoria.index'));
    }
    public function render()
    {
        return view('livewire.categoria.editar-categoria-component');
    }
}
