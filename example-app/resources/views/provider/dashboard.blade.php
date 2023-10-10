@extends('auth.layout')

@section('content')
    <div class="mt-5">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Productos</h5>
                        <p class="card-text">Acceda al listado de productos y a las opciones de creación y edición de productos.</p>
                        <a href="{{ route("provider-products") }}" type="button" class="btn btn-outline-dark">Acceder</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Entregas</h5>
                        <p class="card-text">Cambie el estado de entrega de los clientes.</p>
                        <a href="{{ route('provider-deliveries') }}" type="button" class="btn btn-outline-dark">Acceder</a>
                    </div>
                </div>
            </div>
        </div>
        <div class=" mt-5 row justify-content-center">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Estadísticas</h5>
                        <p class="card-text">Revise las principales estadísticas del negocio.</p>
                        <a href="" type="button" class="btn btn-outline-dark">Comprar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

