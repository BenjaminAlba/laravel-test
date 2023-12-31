@extends('auth.layout')

@section('content')
    <div class="mt-5">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Productos</h5>
                        <p class="card-text">Acceda al listado de productos y a las opciones de creación y edición de productos.</p>
                        <a href="{{ route("admin-products") }}" type="button" class="btn btn-outline-dark">Acceder</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Proveedores</h5>
                        <p class="card-text">Acceda al listado de proveedores y a las opciones de creación y edición de proveedores.</p>
                        <a href="{{ route("admin-providers") }}" type="button" class="btn btn-outline-dark">Acceder</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
