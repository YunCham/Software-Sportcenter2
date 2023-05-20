<?php

namespace App\Http\Livewire\Servicio;

use Livewire\Component;
use App\Models\Servicio;

class ServicioComponent extends Component
{

    public function deleteServicio($servicio_id)
    {
        $servicio = Servicio::find($servicio_id);
        $servicio->delete();
        session()->flash('message', 'Registro elimidado exitosamente!');
    }


    public function render()
    {
        $servicios = Servicio::orderBy('nombre', 'ASC')->paginate(5);

        return view('livewire.servicio.servicio-component', compact('servicios'));
    }
}
