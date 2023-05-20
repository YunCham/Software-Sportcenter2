<?php

namespace App\Http\Livewire\TpServicio;

use App\Models\TipoServicio;
use Livewire\Component;
use  Livewire\WithPagination;
use Livewire\WithFileUploads;

class EditarComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $tservicio_id;
    public $nombre;

    public function mount($tservicio_id)
    {
        $tiposervicio = TipoServicio::find($tservicio_id);
        $this->tservicio_id = $tservicio_id;
        $this->nombre = $tiposervicio->nombre;
       
    }
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'nombre' => 'required',
        ]);
    }
    public function updateTipoServicio(){
        $this->validate([      
            'nombre' => 'required',
        ]);
        $tipoServicio = TipoServicio::find($this->tservicio_id);
        $tipoServicio->nombre = $this->nombre;
        $tipoServicio->save();
        session()->flash('status', 'Datos actualizados!');
    }
    
     //función para retroceder
   public function goBack()
   {
       // Lógica adicional si es necesario
       $this->redirect(route('tservicio.index'));
   }
    public function render()
    {
        return view('livewire.tp-servicio.editar-component');
    }
}
