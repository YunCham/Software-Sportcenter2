<?php

namespace App\Http\Livewire\Membresia;

use App\Models\Membresia;
use Livewire\Component;
use Livewire\WithPagination;

class MembresiaComponent extends Component
{
    use WithPagination;

    public function render()
    {

        $membresias = Membresia::orderBy('nombre', 'ASC')->paginate(5);

        return view('livewire.membresia.membresia-component', ['membresias' => $membresias]);
    }
}
