<?php

namespace App\Http\Livewire\Servicio;

use Livewire\Component;
use App\Models\Servicio;
use App\Models\TipoServicio;
use Livewire\WithFileUploads;

class EditarServicioComponent extends Component
{
    use WithFileUploads;

    public $servicio_id;
    public $nombre;
    public $descripcion;
    public $estado;
    public $tipoServicio_id;


    public function mount($servicio_id)
    {
        $servicio = Servicio::find($servicio_id);
        $this->servicio_id = $servicio_id;
        $this->nombre = $servicio->nombre;
        $this->descripcion = $servicio->descripcion;
        $this->estado = $servicio->estado;
        $this->tipoServicio_id = $servicio->tipo_servicio_id;
    }
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'nombre' => 'required',
            'estado' => 'required',
            'tipoServicio_id' => 'required',
        ]);
    }
    public function updateServicio()
    {
        $this->validate([
            'nombre' => 'required',
            'estado' => 'required',
            'tipoServicio_id' => 'required',
        ]);
        $servicio = Servicio::find($this->servicio_id);
        $servicio->nombre = $this->nombre;
        $servicio->descripcion = $this->descripcion;
        $servicio->estado = $this->estado;
        $servicio->tipo_servicio_id = $this->tipoServicio_id;
        $servicio->save();
        session()->flash('status', 'Datos actualizados!');
    }


    //función para retroceder
    public function goBack()
    {
        // Lógica adicional si es necesario
        $this->redirect(route('servicio.index'));
    }

    public function render()
    {   $tservicios = TipoServicio::all();
        return view('livewire.servicio.editar-servicio-component',compact('tservicios'));
    }
}
