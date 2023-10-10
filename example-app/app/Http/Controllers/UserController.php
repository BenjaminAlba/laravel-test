<?php

namespace App\Http\Controllers;

use App\Models\DetalleSolicitud;
use App\Models\Direccion;
use App\Models\Producto;
use App\Models\Solicitud;
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

    public function historyIndex()
    {
        $userId = Auth::id();
        $hasActiveSolicitud = Solicitud::where('idusuario', $userId)
            ->where('estadofinalizacion', 'activa')
            ->exists();
        if ($hasActiveSolicitud) {
            $activeSolicitud = Solicitud::where('idusuario', $userId)
                ->where('estadofinalizacion', 'activa')
                ->first();
            $idSolicitud = $activeSolicitud->id;
            $detalleSolicitudes = DetalleSolicitud::where('idsolicitud', $idSolicitud)->get();

            $detalleSolicitudesPaginated = DetalleSolicitud::where('idsolicitud', $idSolicitud)->paginate(10);

            $detalleSolicitudesPaginated->each(function ($detalle) {
                $producto = Producto::find($detalle->idproducto);

                // Add the fetched Producto to the DetalleSolicitud
                $detalle->producto = $producto;
            });
            return view('user.history', [
                'detalleSolicitudes' => $detalleSolicitudesPaginated,
                'activeSolicitud' => $activeSolicitud,
                'count' => $detalleSolicitudes->count()
            ]);
        } else {
            return view('user.history', ['activeSolicitud' => null]);
        }
    }

    public function deleteDetail(DetalleSolicitud $detalleSolicitud)
    {
        if ($detalleSolicitud->cantidad > 1) {
            $detalleSolicitud->cantidad = $detalleSolicitud->cantidad - 1;
            $detalleSolicitud->save();
        } else {
            $detalleSolicitud->delete();
        }
        return redirect()->route('user-history');
    }

    public function archivedIndex()
    {
        $userId = Auth::id();
        $solicitudes = Solicitud::where('idusuario', $userId)
            ->where('estadofinalizacion', 'finalizada')
            ->get();
        if ($solicitudes)
            return view('user.archivedrequests', ['solicitudes' => $solicitudes]);
        else
            return view('user.archivedrequests', ['solicitudes' => null]);
    }

    public function archivedDetail(Solicitud $solicitud)
    {
        $detalleSolicitudesPaginated = DetalleSolicitud::where('idsolicitud', $solicitud->id)->paginate(10);
        $detalleSolicitudesPaginated->each(function ($detalle) {
            $producto = Producto::find($detalle->idproducto);

            // Add the fetched Producto to the DetalleSolicitud
            $detalle->producto = $producto;
        });

        return view('user.archiveddetail', [
            'detalleSolicitudes' => $detalleSolicitudesPaginated,
            'solicitud' => $solicitud
        ]);
    }
}