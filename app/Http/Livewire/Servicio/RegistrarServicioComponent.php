<?php

namespace App\Http\Livewire\Servicio;

use App\Models\Servicio;
use Livewire\Component;
use App\Models\TipoServicio;

class RegistrarServicioComponent extends Component
{
    public $nombre;
    public $descripcion;
    public $estado;
    public $tipoServicio_id;


    
    public function storeServicio(){
        $this->validate([
            'nombre' => 'required',
            'estado' => 'required|in:Activo,Inactivo',
            'tipoServicio_id' => 'required',
        ]);
        $servicio = new Servicio();
        $servicio->nombre = $this->nombre;
        $servicio->descripcion = $this->descripcion;
        $servicio->estado = $this->estado;
        $servicio->tipo_servicio_id = $this->tipoServicio_id;
        $servicio->save();
        session()->flash('status', 'Nuevo SERVICIO registrado!');
    }
    //función para retroceder
    public function goBack()
    {
        // Lógica adicional si es necesario
        $this->redirect(route('servicio.index'));
    }
    public function render()
    {
        $tservicios = TipoServicio::all();
        return view('livewire.servicio.registrar-servicio-component', compact('tservicios'));
    }
}
