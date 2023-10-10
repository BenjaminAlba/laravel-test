<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function providerIndex()
    {
        $usuarios = User::where('role', 'proveedor')->paginate(10);
        return view('admin.providers', ['usuarios' => $usuarios]);
    }

    public function createProvider(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'proveedor'
        ]);

        return back();
    }

    public function editProvider(User $usuario)
    {
        return view('admin.editprovider', ['usuario' => $usuario]);
    }

    public function updateProvider(user $usuario, Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $data['password'] = bcrypt($request->password);

        $usuario->update($data);

        return redirect()->route('admin-providers');
    }

    public function deleteProvider(User $usuario)
    {
        $usuario->delete();
        return redirect()->route('admin-providers');
    }
}