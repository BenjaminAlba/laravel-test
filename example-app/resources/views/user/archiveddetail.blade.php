@extends('auth.layout')

@section('content')
    <div class="mt-5">
        <div class="row">
            <h2 class="font-weight-bold text-white mb-3">Archivo de Solicitud {{ $solicitud->id }}</h2>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Estado Entrega</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detalleSolicitudes as $detalleSolicitud)
                        <tr>
                            <th scope="row">{{ $detalleSolicitud->id }}</th>
                            <td>{{ $detalleSolicitud->producto->nombre }}</td>
                            <td>{{ $detalleSolicitud->cantidad }}</td>
                            <td>{{ $detalleSolicitud->estadoentrega }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $detalleSolicitudes->links() }}
        </div>
    </div>
@endsection
