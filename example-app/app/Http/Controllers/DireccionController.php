<?php

namespace App\Http\Controllers;

use App\Models\Direccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class DireccionController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->validate([
            'calle' => 'required',
            'numero' => 'required',
        ]);

        $data['idusuario'] = Auth::id();

        Direccion::create($data);

        return back();
    }

    public function edit()
    {
        $userId = Auth::id();
        $direccion = Direccion::where('idusuario', $userId)->first();
        if($direccion)
            return view('user.editdomicilio', ['direccion' => $direccion]);
        else
            return redirect()->route('user-dashboard');
    }

    public function update(Direccion $direccion, Request $request)
    {
        $data = $request->validate([
            'calle' => 'required',
            'numero' => 'required',
        ]);

        $direccion->update($data);

        return redirect()->route('user-dashboard.data');
    }
}
