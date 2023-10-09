@extends('auth.layout')

@section('content')
    <div class="mt-5">
        <h2 class="text-white">Editar Proveedores</h2>
        <form method="post" action="{{ route("admin-providers.update", ['usuario' => $usuario]) }}">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="InputNombre" class="form-label text-white font-weight-bold">Nombre</label>
                <input name="name" type="text" class="text-white form-control bg-secondary border-dark" id="InputNombre"
                    value="{{ $usuario->name }}" />
            </div>
            <div class="mb-3">
                <label for="InputEmail" class="form-label text-white font-weight-bold">Correo</label>
                <input name="email" type="email" class="text-white form-control bg-secondary border-dark"
                    id="InputEmail" value="{{ $usuario->email }}" />
            </div>
            <div class="mb-3">
                <label for="InputPassword" class="form-label text-white font-weight-bold">Contraseña</label>
                <input name="password" type="password" class="text-white form-control bg-secondary border-dark"
                    id="InputPassword" />
            </div>
            <div class="mb-3">
                <label for="InputPassword2" class="form-label text-white font-weight-bold">Confirmar Contraseña</label>
                <input name="password" type="password" class="text-white form-control bg-secondary border-dark"
                    id="InputPassword2" />
            </div>
            <button type="submit" class="btn btn-dark">Modificar</button>
        </form>
    </div>
@endsection
