<?php

namespace App\Http\Livewire\Marca;

use Livewire\Component;
use App\Models\Marca;
class EditarMarcaComponent extends Component
{

    public $marca_id;
    public $nombre;
    public function mount($marca_id)
    {
        $marca = Marca::find($marca_id);
        $this->marca_id = $marca_id;
        $this->nombre = $marca->nombre;
    }
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'nombre' => 'required',
        ]);
    }
    public function updateMarca()
    {
        $this->validate([
            'nombre' => 'required',
        ]);
        $marca= Marca::find($this->marca_id);
        $marca->nombre = $this->nombre;
        $marca->save();
        //session()->flash('status', 'Datos actualizados!');
        return redirect(route('marca.index'))->with('status', 'Datos actualizados!');
    }

    //función para retroceder
    public function goBack()
    {
        // Lógica adicional si es necesario
        $this->redirect(route('marca.index'));
    }
    public function render()
    {
        return view('livewire.marca.editar-marca-component');
    }
}
