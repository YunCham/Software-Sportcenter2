<?php

namespace App\Http\Livewire\Servicio;

use App\Models\Servicio;
use App\Models\Tservicio;
use Livewire\Component;

class EditarServicioComponet extends Component
{
	public $servicio_id;
	public $nombre;
	public $duracion;
	public $precio;
	public $estado;
	public $descripcion;
	public $tservicio_id;


	public function updated($fields)
	{
		$this->validateOnly($fields, [
			'nombre' => 'required',
			'duracion' => 'required',
			'precio' => 'required',
			'estado' => 'required'
		]);
	}


	public function mount($servicio_id)
	{
			$servicio = Servicio::find($servicio_id);
			$this->servicio_id = $servicio->id;
			$this->nombre = $servicio->nombre;
			$this->duracion = $servicio->duracion;
			$this->precio = $servicio->precio;
			$this->estado = $servicio->estado;
			$this->descripcion = $servicio->descripcion;
			$this->tservicio_id = $servicio->tservicio_id;
	}

	public function updateServicio()
	{
		$this->validate([
			'nombre' => 'required',
			'duracion' => 'required',
			'precio' => 'required',
			'estado' => 'required'

		]);
		$servicio = Servicio::find($this->servicio_id);
		$servicio->nombre = $this->nombre;
		$servicio->duracion = $this->duracion;
		$servicio->precio = $this->precio;
		$servicio->estado = $this->estado;
		$servicio->descripcion = $this->descripcion;
		$servicio->tservicio_id = $this->tservicio_id;

		$servicio->save();
		session()->flash('message', 'Cambios registrados !');
	}

	//función para retroceder
	public function goBack()
	{
		// Lógica adicional si es necesario
		$this->redirect(route('servicio'));
	}

	public function render()
	{
		$tiposervicios = Tservicio::orderBy('nombre', 'ASC')->get();
		return view('livewire.servicio.editar-servicio-componet', ['tiposervicios' => $tiposervicios]);
	}
}
