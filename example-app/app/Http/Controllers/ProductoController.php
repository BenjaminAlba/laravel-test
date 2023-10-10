<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Solicitud;
use App\Models\DetalleSolicitud;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class ProductoController extends Controller
{
    public function adminIndex()
    {
        $productos = Producto::paginate(10);
        foreach ($productos as $producto) {
            $user = User::find($producto->idusuario);
            $producto->user = $user;
        }

        return view('product.list', ['productos' => $productos]);
    }

    public function providerIndex()
    {
        $userId = Auth::id();
        $productos = Producto::where('idusuario', $userId)->paginate(10);
        return view('product.list', ['productos' => $productos]);
    }

    public function userIndex()
    {
        $productos = Producto::paginate(10);
        foreach ($productos as $producto) {
            $user = User::find($producto->idusuario);
            $producto->user = $user;
        }
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

    public function addToCart(Producto $producto)
    {
        $userId = Auth::id();

        $hasActiveSolicitud = Solicitud::where('idusuario', $userId)
        ->where('estadofinalizacion', 'activa')
        ->exists();

        if(!$hasActiveSolicitud)
        {
            Solicitud::create([
                'idusuario' => $userId,
                'fecha' => Carbon::today(),
                'estadofinalizacion' => 'activa',
            ]); 
        }

        $activeSolicitud = Solicitud::where('idusuario', $userId)
            ->where('estadofinalizacion', 'activa')
            ->first();

        $idSolicitud = $activeSolicitud->id;

        $detalleSolicitud = DetalleSolicitud::where([
            ['idsolicitud', $idSolicitud],
            ['idproducto', $producto->id],
        ])->first();

        if($detalleSolicitud){
            $detalleSolicitud->cantidad = $detalleSolicitud->cantidad + 1;
            $detalleSolicitud->save();
        }
        else{
            DetalleSolicitud::create([
                'idsolicitud' => $activeSolicitud->id,
                'idproducto' => $producto->id,
                'cantidad' => 1,
                'estadoentrega' => 'No Entregado',
            ]);
        }
        return redirect()->route('user-products');
    }
}