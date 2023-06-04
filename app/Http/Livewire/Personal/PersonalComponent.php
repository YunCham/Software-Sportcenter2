<?php

namespace App\Http\Livewire\Personal;

use App\Models\Personal;
use Livewire\Component;
use Livewire\WithPagination;

class PersonalComponent extends Component
{
  use WithPagination;


  public $deletedPersonalId;
  public function deletePersonal($personal_id)
  {
    $personal = Personal::find($personal_id);
    $personal->delete();
    $this->deletedPersonalId = $personal_id;
   /* session()->flash('message', 'Registro eliminado exitosamente!');*/
  }

  public function render()
  {
    $personales = Personal::orderBy('nombre', 'ASC')->paginate(5);
    return view('livewire.personal.personal-component', ['personales' => $personales]);
  }
}
