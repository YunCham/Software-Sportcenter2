<?php

namespace App\Http\Livewire\TpServicio;

use App\Models\TipoServicio;
use Livewire\Component;
use Livewire\WithPagination;

class TiposComponent extends Component
{
    use WithPagination;
     
    public $tservicio_id;
    public $deletedTservicioId;
    public function deleteTipoServicio($tservicio_id)
    {
        $tipoServicio = TipoServicio::find($tservicio_id);
        $tipoServicio->delete();
        $this->deletedTservicioId = $tservicio_id;
      /*  session()->flash('message', 'Registro eliminado exitosamente!');*/
    }
    public function render()
    {
        $tservicios = TipoServicio::orderBy('nombre', 'ASC')->paginate(5);
        return view('livewire.tp-servicio.tipos-component', ['tservicios' => $tservicios]);
    }
}
