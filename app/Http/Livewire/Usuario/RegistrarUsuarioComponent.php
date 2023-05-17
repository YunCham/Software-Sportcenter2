<?php

namespace App\Http\Livewire\Usuario;

use App\Models\Personal;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class RegistrarUsuarioComponent extends Component
{

  use WithFileUploads;
  public $name;
  public $email;
  public $phone;
  public $location;
  public $about;
  public $password;
  public $personal_id;

  public function updated($fields)
  {
    $this->validateOnly($fields, [
      'name' => 'required',
      'email' => 'required',
      'password' => 'required'
    ]);
  }

  //Implemtamos metodo para registrar un usuario 
  public function storeUsuario()
  {
    $this->validate([
      'name' => 'required',
      'email' => 'required',
      'password' => 'required'
    ]);

    $user = new User();
    $user->name = $this->name;
    $user->email = $this->email;
    $user->phone = $this->phone;
    $user->location = $this->location;
    $user->about = $this->about;
    $user->password = $this->password;
    $user->personal_id = $this->personal_id;

    $user->save();
    session()->flash('message', 'Nuevo Usuario registrado!');
  }

  //función para retroceder
  public function goBack()
  {
    // Lógica adicional si es necesario
    $this->redirect(route('usuario'));
  }

  public function render()
  {
    $personales=Personal::orderBy('nombre','ASC')->get();
    return view('livewire.usuario.registrar-usuario-component',['personales'=>$personales]);
  }
}
