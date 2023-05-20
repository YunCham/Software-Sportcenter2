<?php

namespace App\Http\Livewire\Servicio;

use App\Models\Tservicio;
use Livewire\Component;

class EditarTipoServicioComponet extends Component
{

  public $nombre;
  public $tipo_servicio_id;

  public function mount($tipo_servicio_id)
  {
    $tiposervicio = Tservicio::find($tipo_servicio_id);
    $this->tipo_servicio_id = $tiposervicio->id;
    $this->nombre = $tiposervicio->nombre;
  }


  public function updated($fields)
  {
    $this->validateOnly($fields, [
      'nombre' => 'required'
    ]);
  }

  public function updateTipoServicio()
  {
    $this->validate([
      'nombre' => 'required'
    ]);
    $tiposervicio = Tservicio::find($this->tipo_servicio_id);
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
    return view('livewire.servicio.editar-tipo-servicio-componet');
  }
}
