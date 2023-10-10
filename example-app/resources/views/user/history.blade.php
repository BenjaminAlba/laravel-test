@extends('auth.layout')

@section('content')
    <div class="mt-5">
        <div class="row">
            <div class="col">
                <h2 class="font-weight-bold text-white mb-3">Solicitud Activa</h2>
                @if ($activeSolicitud)
                    <div class="row">
                        <div class="col">
                            <h4 class="font-weight-bold text-white">Número de productos: {{ $count }}</h4>
                        </div>
                        <div class="col d-flex flex-row-reverse">
                            <a class="text-white" href="{{ route('user-history.archived') }}">Ver Historial</a>
                        </div>
                    </div>
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Estado Entrega</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detalleSolicitudes as $detalleSolicitud)
                                <tr>
                                    <th scope="row">{{ $detalleSolicitud->id }}</th>
                                    <td>{{ $detalleSolicitud->producto->nombre }}</td>
                                    <td>{{ $detalleSolicitud->cantidad }}</td>
                                    <td>{{ $detalleSolicitud->estadoentrega }}</td>
                                    <td>
                                        <form method="post"
                                            action="{{ route('user-history.delete', ['detalleSolicitud' => $detalleSolicitud]) }}">
                                            @csrf
                                            @method('delete')
                                            <span>
                                                <button type="submit" value="Delete" class="bg-transparent border-0">
                                                    <i class="fa-solid fa-trash" style="color: #ffffff;"></i>
                                                </button>
                                            </span>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $detalleSolicitudes->links() }}
                @else
                    <div class="col">
                        <h3 class="font-weight-bold text-white">No hay nada que mostrar</h3>
                    </div>
                    <div class="col d-flex flex-row-reverse">
                        <a class="text-white" href="{{ route('user-history.archived') }}">Ver Historial</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
