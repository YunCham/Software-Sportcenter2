<?php

namespace App\Http\Livewire\Marca;

use App\Models\Marca;
use Livewire\Component;

class RegistrarMarcaComponent extends Component
{

    public $nombre;

    public function storeMarca()
    {
        $this->validate([
            'nombre' => 'required',

        ]);
        $marca = new Marca();
        $marca->nombre = $this->nombre;
        $marca->save();
        return redirect(route('marca.index'))->with('status', 'Nueva MARCA registrada!');
        //session()->flash('status', 'Nuevo tipo registrado!');
    }
    //función para retroceder
    public function goBack()
    {
        // Lógica adicional si es necesario
        $this->redirect(route('marca.index'));
    }
    public function render()
    {
        return view('livewire.marca.registrar-marca-component');
    }
}
