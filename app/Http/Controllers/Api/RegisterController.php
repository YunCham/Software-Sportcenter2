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

    public function update(Request $request, User $user) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $user->id,
        ], [
            'name.required' => 'El campo nombre es obligatorio',
            'email.unique' => 'El email ya se encuentra registrado',
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->location = $request->location;
        $user->about = $request->about;
        $user->password = $request->password;
        $user->personal_id = $request->personal_id;
        $user->save();
        return $user;
    }

    public function destroy($id) {
        $user = User::find($id);
        $user->delete();
        return $user;
    }
}

