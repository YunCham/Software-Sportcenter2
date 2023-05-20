<?php

namespace App\Http\Livewire\Membresia;

use App\Models\Membresia;
use App\Models\Servicio;
use Livewire\Component;

class RegistrarMembresiaComponent extends Component
{

    public $nombre;
    public $precio;
    public $estado = 0;
    public $fecha_inicio;
    public $fecha_fin;
    public $descripcion;
    public $selectedServicios = [];


    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'nombre' => 'required',
            'precio' => 'required',
            'estado' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required'
        ]);
    }

    public function storeMembresia()
    {
        $this->validate([
            'nombre' => 'required',
            'precio' => 'required',
            'estado' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'selectedServicios' => 'required', //   |array|min:1   Asegura que al menos un servicio esté seleccionado

        ]);

        $membresia = new Membresia();
        $membresia->nombre = $this->nombre;
        $membresia->precio = $this->precio;
        $membresia->estado = $this->estado;
        $membresia->fecha_inicio = $this->fecha_inicio;
        $membresia->fecha_fin = $this->fecha_fin;
        $membresia->descripcion = $this->descripcion;
        $membresia->save();

            // Asignar las categorías seleccionadas al producto
            // $membresia->categories()->sync($request->input('categories'));

        $membresia->servicio()->sync( $this->selectedServicios);

        session()->flash('message', 'Nueva Membresia registrado !');
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
        // ::orderBy('nombre','ASC')->get();
        return view('livewire.membresia.registrar-membresia-component', ['servicios' => $servicios]);
    }
}
