<?php

namespace App\Http\Livewire\Personal;

use App\Models\Personal;
use Livewire\Component;
use Livewire\WithFileUploads;

class RegistrarPersonalComponent extends Component

{
  use WithFileUploads;
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
      'salario' => 'nullable|numeric|regex:/^\d{1,10}(\.\d{1,2})?$/',
      'calle' => 'required',
      'n_casa' => 'required|numeric|regex:/^\d+$/',
      'fecha_inicio_contrato' => 'required',
      'fecha_fin_contrato' => 'required',
      'estado' => 'required'
    ], [
      'n_casa.regex' => 'El número de casa debe ser un valor numérico sin puntos decimales.',
      'salario.regex' => 'El salario debe ser un valor decimal válido con hasta 10 dígitos enteros y hasta 2 dígitos decimales.'
    ]);
  }

  public function storePersonal()
  {
    $this->validate([
      'ci' => 'required',
      'nombre' => 'required',
      'apellidos' => 'required',
      'fecha_nacimiento' => 'required',
      'genero' => 'required',
      'telefono' => 'required',
      'distrito' => 'required',
      'salario' => 'nullable|numeric|regex:/^\d{1,10}(\.\d{1,2})?$/',
      'calle' => 'required',
      'n_casa' => 'required|numeric|regex:/^\d+$/',
      'fecha_inicio_contrato' => 'required',
      'fecha_fin_contrato' => 'required',
      'estado' => 'required'
    ], [
      'n_casa.regex' => 'El número de casa debe ser un valor numérico sin puntos decimales.',
      'salario.regex' => 'El salario debe ser un valor decimal válido con hasta 10 dígitos enteros y hasta 2 dígitos decimales.'
    ]);
    $personal = new Personal();
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
    session()->flash('status', 'Nuevo PERSONAL registrado!');
  }

  //función para retroceder
  public function goBack()
  {
    // Lógica adicional si es necesario
    $this->redirect(route('perosnal.index'));
  }

  public function render()
  {
    return view('livewire.personal.registrar-personal-component');
  }
}
