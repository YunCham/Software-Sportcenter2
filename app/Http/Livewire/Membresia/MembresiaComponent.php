<?php

namespace App\Http\Livewire\Membresia;

use Livewire\Component;
use App\Models\Membresia;
use Livewire\WithPagination;
class MembresiaComponent extends Component
{
    use WithPagination;

    public function deleteMembresia($membresia_id){
        $membresia = Membresia::find($membresia_id);
        $membresia->delete();

    }
    public function render()
    {
        $membresias = Membresia::orderBy('nombre', 'ASC')->paginate(5);
        return view('livewire.membresia.membresia-component',['membresias' => $membresias]);
    }
}
