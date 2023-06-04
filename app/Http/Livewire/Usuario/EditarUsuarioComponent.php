<?php

namespace App\Http\Livewire\Usuario;

use App\Models\Personal;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditarUsuarioComponent extends Component
{

    use WithFileUploads;
    public $user_id;
    public $name;
    public $email;
    public $phone;
    public $location;
    public $about;
    public $password;
    public $personal_id;

    public function mount($user_id)
    {
        $user = User::find($user_id);
        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->location = $user->location;
        $this->about = $user->about;
        $this->password = $user->password;
        $this->personal_id = $user->personal_id;
    }
  
    public function updated($fields)
    {
      $this->validateOnly($fields, [
        'name' => 'required',
        'email' => 'required',
        'password' => 'required'
      ]);
    }
  
    //Implemtamos metodo para registrar un usuario 
    public function updateUsuario()
    {
      $this->validate([
        'name' => 'required',
        'email' => 'required',
        'password' => 'required'
      ]);
  
      $user = User::find($this->user_id);
      $user->name = $this->name;
      $user->email = $this->email;
      $user->phone = $this->phone;
      $user->location = $this->location;
      $user->about = $this->about;
      $user->password = $this->password;
      $user->personal_id = $this->personal_id;
  
      $user->save();
      session()->flash('message', 'Actualizacion exitosa!');
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
        return view('livewire.usuario.editar-usuario-component',['personales'=>$personales]);
    }
}
