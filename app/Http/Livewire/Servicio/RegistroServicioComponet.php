<?php

namespace App\Http\Livewire\Servicio;

use App\Models\Servicio;
use App\Models\Tservicio;
use Livewire\Component;

class RegistroServicioComponet extends Component
{
  public $nombre;
  public $duracion;
  public $precio;
  public $estado = 0;
  public $descripcion;
  public $tservicio_id;


  public function updated($fields)
  {
    $this->validateOnly($fields, [
      'nombre' => 'required',
      'duracion' => 'required',
      'precio' => 'required',
      'estado' => 'required'
    ]);
  }

  public function storeServicio()
  {
    $this->validate([
      'nombre' => 'required',
      'duracion' => 'required',
      'precio' => 'required',
      'estado' => 'required'

    ]);
    $servicio = new Servicio();
    $servicio->nombre = $this->nombre;
    $servicio->duracion = $this->duracion;
    $servicio->precio = $this->precio;
    $servicio->estado = $this->estado;
    $servicio->descripcion = $this->descripcion;
    $servicio->tservicio_id= $this->tservicio_id;

    $servicio->save();
    session()->flash('message', 'Nuevo servicio registrado !');
  }

  //función para retroceder
  public function goBack()
  {
    // Lógica adicional si es necesario
    $this->redirect(route('servicio'));
  }

  public function render()
  {

    $tiposervicios = Tservicio::orderBy('nombre', 'ASC')->get();
    return view('livewire.servicio.registro-servicio-componet', ['tiposervicios' => $tiposervicios]);
  }
}
