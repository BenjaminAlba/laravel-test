@extends('auth.layout')

@section('content')
    <div class="mt-5">
        <div class="row">
            <h2 class="font-weight-bold text-white mb-3">Historial de Solicitudes</h2>
            @if ($solicitudes)
                @foreach ($solicitudes as $solicitud)
                    <div class="card mt-2">
                        <div class="card-body">
                            <h5 class="card-title">ID: {{ $solicitud->id }}</h5>
                            <div class="row">
                                <div class="col">
                                    <h5 class="">Fecha: {{ $solicitud->fecha }}</h5>
                                </div>
                                <div class="col d-flex flex-row-reverse">
                                    <a class="text-black" href="{{ route('user-history.archivedDetail', ['solicitud' => $solicitud]) }}">Ver Detalles</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <h3 class="font-weight-bold text-white">No hay nada que mostrar</h3>
            @endif
        </div>
    </div>
@endsection
