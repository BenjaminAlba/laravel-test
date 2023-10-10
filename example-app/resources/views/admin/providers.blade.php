@extends('auth.layout')

@section('content')
    <div class="mt-5">
        <div class="row">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Editar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <th scope="row">{{ $usuario->id }}</th>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td class="d-flex flex-row">
                                <a href="{{ route('admin-providers.edit', ['usuario' => $usuario]) }}">
                                    <span class="px-2">
                                        <i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i>
                                    </span>
                                </a>
                                <form method="post" action="{{ route('admin-providers.delete', ['usuario' => $usuario]) }}">
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
        </div>

        {{ $usuarios->links() }}
        
        <!-- Collapse -->
        <div class="row mt-2">
            <p class="d-inline-flex gap-1">
                <button class="btn btn-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                    aria-expanded="false" aria-controls="collapseExample">
                    Agregar Proveedor
                </button>
            </p>
            <div class="collapse" id="collapseExample">
                <div class="card card-body bg-secondary border-secondary">
                    <!-- add product form -->
                    <form method="post" action="{{ route('admin-providers.create') }}">
                        @csrf
                        @method('post')
                        <div class="mb-3">
                            <label for="InputNombre" class="form-label text-white font-weight-bold">Nombre</label>
                            <input name="name" type="text" class="text-white form-control bg-secondary border-dark"
                                id="InputNombre" placeholder="Nombre del proveedor" />
                        </div>
                        <div class="mb-3">
                            <label for="InputEmail" class="form-label text-white font-weight-bold">Correo</label>
                            <input name="email" type="email" class="text-white form-control bg-secondary border-dark"
                                id="InputEmail" placeholder="Correo del proveedor" />
                        </div>
                        <div class="mb-3">
                            <label for="InputPassword" class="form-label text-white font-weight-bold">Contraseña</label>
                            <input name="password" type="password" class="text-white form-control bg-secondary border-dark"
                                id="InputPassword"/>
                        </div>
                        <div class="mb-3">
                            <label for="InputPassword2" class="form-label text-white font-weight-bold">Confirmar Contraseña</label>
                            <input name="password" type="password" class="text-white form-control bg-secondary border-dark"
                                id="InputPassword2"/>
                        </div>
                        <button type="submit" class="btn btn-dark">Crear</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
