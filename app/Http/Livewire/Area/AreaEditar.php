<?php

namespace App\Http\Livewire\Area;

use App\Models\area;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class AreaEditar extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $area_id;
    public $name;
    public $descripcion;
    public $estado;
    public $tipo;

    public function mount($area_id)
    {
    $area = area::find($area_id);
    $this->area_id = $area->id;
    $this->name = $area->name;
    $this->descripcion = $area->descripcion;
    $this->estado = $area->estado;
    $this->tipo = $area->tipo;
    }
    public function updated($fields)
    {
    $this->validateOnly($fields, [
        'name' => 'required',
        'descripcion' => 'required',
        'estado' => 'required',
        'tipo' => 'required',
        
    ]);
    }
    public function updateArea()
  {
    $this->validate([
        'name' => 'required',
        'descripcion' => 'required',
        'estado' => 'required',
        'tipo' => 'required',
    ]);
    $area = area::find($this->area_id);
    $area->name = $this->name;
    $area->descripcion = $this->descripcion;
    $area->estado = $this->estado;
    $area->tipo = $this->tipo;
    $area->save();
    return redirect(route('area.index'))->with('status', 'Datos actualizados!');
  }

    public function render()
    {
        return view('livewire.area.area-editar');
    }
}
