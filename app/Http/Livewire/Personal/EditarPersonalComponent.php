<?php

namespace App\Http\Livewire\Personal;

use App\Models\Personal;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class EditarPersonalComponent extends Component
{
  use WithPagination;
  use WithFileUploads;
  public $personal_id;
  public $ci;
  public $nombre;
  public $apellidos;
  public $fecha_nacimiento;
  public $genero;
  public $telefono;
  public $distrito;
  public $calle;
  public $n_casa;
  public $cargo;
  public $salario;
  public $fecha_inicio_contrato;
  public $fecha_fin_contrato;
  public $estado;


  public function mount($personal_id)
  {
    $personal = Personal::find($personal_id);
    $this->personal_id = $personal->id;
    $this->ci = $personal->ci;
    $this->nombre = $personal->nombre;
    $this->apellidos = $personal->apellidos;
    $this->fecha_nacimiento = $personal->fecha_nacimiento;
    $this->genero = $personal->genero;
    $this->telefono = $personal->telefono;
    $this->distrito = $personal->distrito;
    $this->calle = $personal->calle;
    $this->n_casa = $personal->n_casa;
    $this->cargo = $personal->cargo;
    $this->salario = $personal->salario;
    $this->fecha_inicio_contrato = $personal->fecha_inicio_contrato;
    $this->fecha_fin_contrato = $personal->fecha_fin_contrato;
    $this->estado = $personal->estado;
  }

  public function updated($fields)
  {
    $this->validateOnly($fields, [
      'ci' => 'required',
      'nombre' => 'required',
      'apellidos' => 'required',
      'fecha_nacimiento' => 'required',
      'genero' => 'required',
      'telefono' => 'required',
      'distrito' => 'required',
      'calle' => 'required',
      'n_casa' => 'required',
      'fecha_inicio_contrato' => 'required',
      'fecha_fin_contrato' => 'required',
      'estado' => 'required'
    ]);
  }

  //implementacion de la funcion donde Edita los datos
  public function updatePersonal()
  {
    $this->validate([
      'ci' => 'required',
      'nombre' => 'required',
      'apellidos' => 'required',
      'fecha_nacimiento' => 'required',
      'genero' => 'required',
      'telefono' => 'required',
      'distrito' => 'required',
      'calle' => 'required',
      'n_casa' => 'required',
      'fecha_inicio_contrato' => 'required',
      'fecha_fin_contrato' => 'required',
      'estado' => 'required'
    ]);
    $personal = Personal::find($this->personal_id);
    $personal->ci = $this->ci;
    $personal->nombre = $this->nombre;
    $personal->apellidos = $this->apellidos;
    $personal->fecha_nacimiento = $this->fecha_nacimiento;
    $personal->genero = $this->genero;
    $personal->telefono = $this->telefono;
    $personal->distrito = $this->distrito;
    $personal->calle = $this->calle;
    $personal->n_casa = $this->n_casa;
    $personal->cargo = $this->cargo;
    $personal->salario = $this->salario;
    $personal->fecha_inicio_contrato = $this->fecha_inicio_contrato;
    $personal->fecha_fin_contrato = $this->fecha_fin_contrato;
    $personal->estado = $this->estado;
    $personal->save();
    session()->flash('status', 'Datos actualizados!');
  }
  
   //función para retroceder
   public function goBack()
   {
       // Lógica adicional si es necesario
       $this->redirect(route('perosnal.index'));
   }
  public function render()
  {
    return view('livewire.personal.editar-personal-component');
  }
}
