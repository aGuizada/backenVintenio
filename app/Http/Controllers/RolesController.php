<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;


class RolesController extends Controller
{
   public function index()
    {
        $roles = Role::all();
        return response()->json($roles);
    }

    public function show($id)
    {
        $role = Role::find($id);
        if (!$role) {
            return response()->json(['message' => 'Rol no encontrado'], 404);
        }
        return response()->json($role);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:roles|max:50',
        ]);

        $role = Role::create([
            'nombre' => $request->input('nombre'),
        ]);

        return response()->json(['message' => 'Rol creado con éxito', 'role' => $role], 201);
    }

    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        if (!$role) {
            return response()->json(['message' => 'Rol no encontrado'], 404);
        }

        $request->validate([
            'nombre' => 'required|unique:roles|max:50',
        ]);

        $role->nombre = $request->input('nombre');
        $role->save();

        return response()->json(['message' => 'Rol actualizado con éxito', 'role' => $role]);
    }
}
