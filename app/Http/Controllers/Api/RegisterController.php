<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
        ], [
            'name.required' => 'El campo nombre es obligatorio',
            'email.required' => 'El campo email es obligatorio',
            'email.unique' => 'El email ya se encuentra registrado',
            'password.required' => 'El campo contraseña es obligatorio',
        ]);
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->location = $request->input('location');
        $user->about = $request->input('about');
        $user->password = $request->input('password');
        $user->personal_id = $request->input('personal_id');
        $user->save();
        return response()->json(['message' => 'Nuevo Usuario registrado'], 201);       
    }

    public function index() {
        $user = User::all();
        return $user;
    }

    public function show($id) {
        $user = User::findOrFail($id);
        return $user;
    }
    
    public function update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'name' => 'required',                
                //'email' => 'required|email|unique:users,email,' . $id,
            ]);
            // Buscar el usuario a actualizar
            $user = User::findOrFail($id);
            // Actualizar
            $user->name = $request->input('name');
            if ($request->has('email')) {
                $user->email = $request->input('email');
            }
            if ($request->has('phone')) {
                $user->phone = $request->input('phone');
            }
            if ($request->has('location')) {
                $user->location = $request->input('location');
            }
            if ($request->has('about')) {
                $user->about = $request->input('about');
            }
            if ($request->has('password')) {
                $user->password = $request->input('password');
            }
            if ($request->has('personal_id')) {
                $user->personal_id = $request->input('personal_id');
            }
            // Guardar los cambios
            $user->save();
            return response()->json(['message' => 'Usuario actualizado correctamente']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al actualizar el usuario'], 500);
        }
    }

    public function destroy($id) {
        $user = User::find($id);
        $user->delete();
        return $user;
    }
}
