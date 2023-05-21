<?php

namespace App\Http\Livewire\Membresia;

use Livewire\Component;
use App\Models\Membresia;
use App\Models\Servicio;
class EditarMembresiaComponent extends Component
{ 
    public $membresia_id;
    public $nombre;
    public $precio;
    public $estado;
    /*public $fecha_inicio;
    public $fecha_fin;*/
    public $descripcion;
    public $selectedServicios = [];


    public function mount($membresia_id)
    {
        $membresia = Membresia::find($membresia_id);
        $this->membresia_id = $membresia->id;
        $this->nombre = $membresia->nombre;
        $this->precio = $membresia->precio;
        $this->estado = $membresia->estado;
       /* $this->fecha_inicio = $membresia->fecha_inicio;
        $this->fecha_fin = $membresia->fecha_fin;*/
        $this->descripcion = $membresia->descripcion;

        //! buscar una solucion los select
        $this->selectedServicios = $membresia->servicios->pluck('id')->toArray();
       
    }


    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'nombre' => 'required',
            'precio' => 'required',
            'estado' => 'required',
            'selectedServicios' => 'required',
           /* 'fecha_inicio' => 'required',
            'fecha_fin' => 'required'*/
        ]);
    }

    public function updateMembresia()
    {
        $this->validate([
            'nombre' => 'required',
            'precio' => 'required',
            'estado' => 'required',
           /* 'fecha_inicio' => 'required',
            'fecha_fin' => 'required',*/
            'selectedServicios' => 'required', // |array|min:1    Asegura que al menos un servicio esté seleccionado

        ]);

        $membresia = Membresia::find($this->membresia_id);
        $membresia->nombre = $this->nombre;
        $membresia->precio = $this->precio;
        $membresia->estado = $this->estado;
       /* $membresia->fecha_inicio = $this->fecha_inicio;
        $membresia->fecha_fin = $this->fecha_fin;*/
        $membresia->descripcion = $this->descripcion;
        $membresia->save();

        $membresia->servicios()->sync($this->selectedServicios);

        session()->flash('status', 'Datos actualizados!');
    }

    //función para retroceder
    public function goBack()
    {
        // Lógica adicional si es necesario
        $this->redirect(route('membresia'));
    }
    public function render()
    {
        $servicios = Servicio::all();
        return view('livewire.membresia.editar-membresia-component', compact('servicios'));
    }
}
