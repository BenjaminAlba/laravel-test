@extends('auth.layout')

@section('content')
    <div class="mt-5">
        <h2 class="text-white">Datos de Dirección</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Dirección</h5>
                <p class="card-text">Calle: {{ $direccion->calle }} Número: {{ $direccion->numero }}</p>
            </div>
        </div>
        <!-- Collapse -->
        <div class="row mt-3">
            <p class="d-inline-flex gap-1">
                <a href="{{ route('user-info.edit') }}" class="btn btn-dark" type="button" >
                    Editar Dirección
                </a>
            </p>
        </div>
    </div>
@endsection
