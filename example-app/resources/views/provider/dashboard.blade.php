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
                        <h5 class="card-title">Proveedores</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a type="button" class="btn btn-outline-dark">Acceder</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

