@extends('auth.layout')

@section('content')
    <div class="mt-5">
        <div class="row">
            <h2 class="font-weight-bold text-white mb-3">Listado de Entregas Pendientes</h2>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre Producto</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Entregar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detalleSolicitudes as $detalle)
                        <tr>
                            <th scope="row">{{ $detalle->id }}</th>
                            <td>{{ $detalle->nombre }}</td>
                            <td>{{ $detalle->cantidad }}</td>
                            <td>{{ $detalle->precio }}</td>
                            <td>
                                <form method="POST" action="{{ route('provider-deliveries.deliver', ['detalleSolicitud' => $detalle]) }}">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="btn text-white">Entregar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
