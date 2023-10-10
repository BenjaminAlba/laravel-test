@extends('auth.layout')

@section('content')
    <div class="mt-5">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Datos personales</h5>
                        <p class="card-text">Revise o modifique sus datos personales.</p>
                        <a href="{{ route('user-dashboard.data') }}" type="button" class="btn btn-outline-dark">Acceder</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Estado de solicitudes</h5>
                        <p class="card-text">Mire el historial de solicitudes y el estado de las solicitudes.</p>
                        <a href="{{ route('user-history') }}" type="button" class="btn btn-outline-dark">Acceder</a>
                    </div>
                </div>
            </div>
        </div>
        <div class=" mt-5 row justify-content-center">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Compra de productos</h5>
                        <p class="card-text">Cree una solicitud de productos añadiendo productos al carrito y publique dicha
                            solicitud para ser entregada.</p>
                        <a href="{{ route("user-products") }}" type="button" class="btn btn-outline-dark">Comprar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
