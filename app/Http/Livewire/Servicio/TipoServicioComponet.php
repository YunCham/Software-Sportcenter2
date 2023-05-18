<?php

namespace App\Http\Livewire\Servicio;

use App\Models\Tservicio;
use Livewire\Component;
use Livewire\WithPagination;

class TipoServicioComponet extends Component
{
    use WithPagination;

    public $tipo_servicio_id;

    public function deleteTipoServico()
{
    $tiposervicio = Tservicio::find($this->tipo_servicio_id);
    $tiposervicio->delete();
    session()->flash('message','Servicio  elimidado exitosamente!');
}

    public function render()
    {
        $tiposervicios = Tservicio::orderBy('nombre', 'ASC')->paginate(5);
        return view('livewire.servicio.tipo-servicio-componet', ['tiposervicios' => $tiposervicios]);
    }
}
