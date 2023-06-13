<?php

namespace App\Http\Livewire\Area;

use App\Models\area;
use Livewire\Component;

class AreaComponent extends Component
{
    public function deleteArea($area_id)
    {
      $area = area::find($area_id);
      $area->delete();
      session()->flash('message','Registro elimidado exitosamente!');
    }
    public function render()
    {
        $area = area::orderBy('name', 'asc')->paginate(5);
        return view('livewire.area.area-component', ['areas' => $area]);
        
    }
}
