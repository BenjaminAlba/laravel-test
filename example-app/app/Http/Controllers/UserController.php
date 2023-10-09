<?php

namespace App\Http\Controllers;

use App\Models\Direccion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.dashboard');
    }

    public function data()
    {
        $userId = Auth::id();
        //first or get?
        $direccion = Direccion::where('idusuario', $userId)->first();
        if (!$direccion) {
            return redirect()->route('user-dashboard.info');
        }

        return view('user.data', ['direccion' => $direccion]);
    }

    public function info()
    {
        $userId = Auth::id();
        $direccion = Direccion::where('idusuario', $userId)->first();
        if ($direccion) {
            return redirect()->route('user-dashboard.data');
        }

        return view('user.info');
    }
}
