<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Personal;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personal = Personal::all();
        return $personal;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
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
        ], [
            'ci.required' => 'Campo ci es obligatorio',
            'nombre.required' => 'Campo nombre es obligatorio',
            'apellidos.required' => 'Campo apellido es obligatorio',
            'fecha_nacimiento.required' => 'Campo fecha Nacimiento es obligatorio',
            'genero.required' => 'Campo genero es obligatorio',
            'telefono.required' => 'Campo telefono es obligatorio',
            'distrito.required' => 'Campo distrito es obligatorio',
            'calle.required' => 'Campo calle es obligatorio',
            'n_casa.required' => 'Campo numero Casa es obligatorio',
            'fecha_inicio_contrato.required' => 'Campo fecha Inicio Contrato es obligatorio',
            'fecha_fin_contrato.required' => 'Campo fecha Fin Contrato es obligatorio',
        ]);
        $personal = new Personal();
        $personal->ci = $request->input('ci');
        $personal->nombre = $request->input('nombre');
        $personal->apellidos = $request->input('apellidos');
        $personal->fecha_nacimiento = $request->input('fecha_nacimiento');
        $personal->genero = $request->input('genero');
        $personal->telefono = $request->input('telefono');
        $personal->distrito = $request->input('distrito');
        $personal->calle = $request->input('calle');
        $personal->n_casa = $request->input('n_casa');
        $personal->fecha_inicio_contrato = $request->input('fecha_inicio_contrato');
        $personal->fecha_fin_contrato = $request->input('fecha_fin_contrato');
        $personal->save();
        return response()->json(['message' => 'Nuevo Personal registrado'], 201);       
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $personal = Personal::findOrFail($id);
        return $personal;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
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
        ], [
            'ci.required' => 'Campo ci es obligatorio',
            'nombre.required' => 'Campo nombre es obligatorio',
            'apellidos.required' => 'Campo apellido es obligatorio',
            'fecha_nacimiento.required' => 'Campo fecha Nacimiento es obligatorio',
            'genero.required' => 'Campo genero es obligatorio',
            'telefono.required' => 'Campo telefono es obligatorio',
            'distrito.required' => 'Campo distrito es obligatorio',
            'calle.required' => 'Campo calle es obligatorio',
            'n_casa.required' => 'Campo numero Casa es obligatorio',
            'fecha_inicio_contrato.required' => 'Campo fecha Inicio Contrato es obligatorio',
            'fecha_fin_contrato.required' => 'Campo fecha Fin Contrato es obligatorio',
        ]);
        $personal = Personal::findOrFail($id);
        $personal->ci = $request->input('ci');
        $personal->nombre = $request->input('nombre');
        $personal->apellidos = $request->input('apellidos');
        $personal->fecha_nacimiento = $request->input('fecha_nacimiento');
        $personal->genero = $request->input('genero');
        $personal->telefono = $request->input('telefono');
        $personal->distrito = $request->input('distrito');
        $personal->calle = $request->input('calle');
        $personal->n_casa = $request->input('n_casa');
        $personal->fecha_inicio_contrato = $request->input('fecha_inicio_contrato');
        $personal->fecha_fin_contrato = $request->input('fecha_fin_contrato');
        $personal->save();
        return response()->json(['message' => 'Personal actualizado correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $personal = Personal::find($id);
        $personal->delete();
        return $personal;
    }
}
