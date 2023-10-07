<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{
    public function adminIndex()
    {
        $productos = Producto::all();
        // Fetch user information for each product
        foreach ($productos as $producto) {
            $user = User::find($producto->idusuario);

            // Attach user information to each product
            $producto->user = $user;
        }

        return view('product.list', ['productos' => $productos]);
    }

    public function providerIndex()
    {
        // Get the ID of the authenticated user
        $userId = Auth::id();

        // Retrieve products where idusuario matches the authenticated user's ID
        $productos = Producto::where('idusuario', $userId)->get();
        return view('product.list', ['productos' => $productos]);
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'precio' => 'required',
        ]);

        $data['idusuario'] = Auth::id();

        Producto::create($data);

        return back();
    }

    public function edit(Producto $producto)
    {
        return view('product.update', ['producto' => $producto]);
    }

    public function update(Producto $producto, Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'precio' => 'required',
        ]);
        //$data['idusuario'] = Auth::id();

        $producto->update($data);

        if(Auth::user()->role == "administrador")
            return redirect()->route("admin-products");
        else if(Auth::user()->role == "proveedor")
            return redirect()->route("provider-products");
    }

    public function delete(Producto $producto)
    {
        $producto->delete();
        if(Auth::user()->role == "administrador")
            return redirect()->route("admin-products");
        else if(Auth::user()->role == "proveedor")
            return redirect()->route("provider-products");
    }
}