<?php

namespace App\Http\Livewire\Categoria;

use App\Models\Categoria;
use Livewire\Component;

class RegistrarCategoriaComponent extends Component
{
    public $nombre;

    public function storeCategoria()
    {
        $this->validate([
            'nombre' => 'required',

        ]);
        $categoria = new Categoria();
        $categoria->nombre = $this->nombre;
        $categoria->save();
        return redirect(route('categoria.index'))->with('status', 'Nueva CATEGORIA registrada!');
        //session()->flash('status', 'Nuevo tipo registrado!');
    }
    //función para retroceder
    public function goBack()
    {
        // Lógica adicional si es necesario
        $this->redirect(route('categoria.index'));
    }
    public function render()
    {
        return view('livewire.categoria.registrar-categoria-component');
    }
}
