<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Solicitud;
use App\Models\DetalleSolicitud;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProviderController extends Controller
{
    public function index()
    {
        return view('provider.dashboard');
    }

    public function deliveriesIndex()
    {
        $userId = Auth::id();
        /*$detalleSolicitudes = DetalleSolicitud::where('estadoentrega', 'No Entregado')
        ->whereExists(function ($query) use ($userId) {
            $query->select(DB::raw(1))
                ->from('productos')
                ->whereColumn('productos.id', 'detalle_solicitud.idproducto')
                ->where('productos.idusuario', $userId);
        })
        ->get();*/
        $detalleSolicitudes = DetalleSolicitud::where('estadoentrega', 'No Entregado')
            ->whereExists(function ($query) use ($userId) {
                $query->select(DB::raw(1))
                    ->from('productos')
                    ->whereColumn('productos.id', 'detalle_solicituds.idproducto')
                    ->where('productos.idusuario', $userId);
            })
            ->join('productos', 'productos.id', '=', 'detalle_solicituds.idproducto')
            ->select('detalle_solicituds.*', 'productos.nombre', 'productos.precio')
            ->get();

        //return view('provider.clientlist', ['detalleSolicitudes' => $detalleSolicitudes]);
        return view('provider.clientlist', compact('detalleSolicitudes'));
    }

    public function deliver(DetalleSolicitud $detalleSolicitud)
    {
        $detalleSolicitud->estadoentrega = 'Entregado';
        $detalleSolicitud->save();

        
        $allDelivered = DetalleSolicitud::where('idsolicitud', $detalleSolicitud->idsolicitud)
            ->where('estadoentrega', '!=', 'Entregado')
            ->doesntExist();

        if($allDelivered)
        {
            $solicitud = Solicitud::find($detalleSolicitud->idsolicitud);
            $solicitud->estadofinalizacion = 'finalizada';
            $solicitud->save();
        }

        return redirect()->route('provider-deliveries');
    }
}