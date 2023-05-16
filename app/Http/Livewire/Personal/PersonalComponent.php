<?php

namespace App\Http\Livewire\Personal;

use App\Models\Personal;
use Livewire\Component;
use Livewire\WithPagination;

class PersonalComponent extends Component
{
  use WithPagination;

  public $personal_id;

  public function deletePersonal($personal_id)
  {
      $personal = Personal::find($personal_id);
      $personal->delete();
      session()->flash('message','Registro elimidado exitosamente!');
  }

  public function render()
  {
    $personales = Personal::orderBy('nombre', 'ASC')->paginate(5);
    return view('livewire.personal.personal-component', ['personales' => $personales]);
  }
}
