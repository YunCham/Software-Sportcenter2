<?php

namespace App\Http\Livewire\Servicio;

use Livewire\Component;
use App\Models\TipoServicio;

class RegistrarServicioComponent extends Component
{
    public $nombre;
    public $descripcion;
    public $estado;
    public $tipoServicio_id;


    
    public function storeServicio(){

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
