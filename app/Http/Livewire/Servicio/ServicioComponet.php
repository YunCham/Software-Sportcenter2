<?php

namespace App\Http\Livewire\Servicio;

use App\Models\Servicio;
use Livewire\Component;
use Livewire\WithPagination;

class ServicioComponet extends Component
{
  use WithPagination;
  public $servicio_id;

  public function deleteServicio()
  {
    $servicio = Servicio::find($this->servicio_id);
    $servicio->delete();
    session()->flash('message', 'Servicio elimidado exitosamente!');
  }
  public function render()
  {
    $servicios = Servicio::orderBy('nombre', 'ASC')->paginate(5);
    return view('livewire.servicio.servicio-componet', ['servicios' => $servicios]);
  }
}
