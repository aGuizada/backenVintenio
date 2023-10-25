<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }
        return response()->json($user);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'numero_telefono' => 'required',
            'ubicacion_latitud' => 'nullable|numeric',
            'ubicacion_longitud' => 'nullable|numeric',
            'disponible' => 'nullable|boolean',
            'rol_id' => 'required', // Nuevo campo rol_id
        ]);

        $user = User::create([
            'nombre' => $request->input('nombre'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'numero_telefono' => $request->input('numero_telefono'),
            'ubicacion_latitud' => $request->input('ubicacion_latitud'),
            'ubicacion_longitud' => $request->input('ubicacion_longitud'),
            'disponible' => $request->input('disponible'),
            'rol_id' => $request->input('rol_id'), // Nuevo campo rol_id
        ]);

        return response()->json(['message' => 'Usuario creado con éxito', 'user' => $user], 201);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required',
            'numero_telefono' => 'required',
            'ubicacion_latitud' => 'nullable|numeric',
            'ubicacion_longitud' => 'nullable|numeric',
            'disponible' => 'nullable|boolean',
            'rol_id' => 'required', // Nuevo campo rol_id
        ]);

        $user->nombre = $request->input('nombre');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->numero_telefono = $request->input('numero_telefono');
        $user->ubicacion_latitud = $request->input('ubicacion_latitud');
        $user->ubicacion_longitud = $request->input('ubicacion_longitud');
        $user->disponible = $request->input('disponible');
        $user->rol_id = $request->input('rol_id'); // Nuevo campo rol_id
        $user->save();

        return response()->json(['message' => 'Usuario actualizado con éxito', 'user' => $user]);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'Usuario eliminado con éxito']);
    }
}
