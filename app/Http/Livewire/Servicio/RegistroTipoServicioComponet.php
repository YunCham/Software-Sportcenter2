<?php

namespace App\Http\Livewire\Servicio;

use App\Models\Tservicio;
use Livewire\Component;

class RegistroTipoServicioComponet extends Component
{
    public $nombre;


    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'nombre' => 'required'
        ]);
    }

    public function storeTipoServicio()
    {
        $this->validate([
            'nombre' => 'required'
        ]);
        $tiposervicio = new Tservicio();
        $tiposervicio->nombre = $this->nombre;
        $tiposervicio->save();
        session()->flash('message', 'Servicio registrado!');
    }
        //función para retroceder
        public function goBack()
        {
          // Lógica adicional si es necesario
          $this->redirect(route('tiposervicio-registro'));
        }
      


    public function render()
    {
        return view('livewire.servicio.registro-tipo-servicio-componet');
    }
}
