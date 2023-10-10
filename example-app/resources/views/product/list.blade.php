@extends('auth.layout')

@section('content')
    @auth
        @if (auth()->user()->role == 'administrador')
            <div class="mt-5">
                <div class="row">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Creador</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $producto)
                                <tr>
                                    <th scope="row">{{ $producto->id }}</th>
                                    <td>{{ $producto->nombre }}</td>
                                    <td>{{ $producto->user->name }}</td>
                                    <td>{{ $producto->precio }}</td>
                                    <td class="d-flex flex-row">
                                        <a href="{{ route('admin-products.edit', ['producto' => $producto]) }}"> <span
                                                class="px-2"> <i class="fa-solid fa-pen-to-square"
                                                    style="color: #ffffff;"></i>
                                            </span> </a>
                                        <form method="post"
                                            action="{{ route('admin-products.delete', ['producto' => $producto]) }}">
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
                <!-- Display pagination links -->
                {{ $productos->links() }}

                <!-- Collapse -->
                <div class="row mt-2">
                    <p class="d-inline-flex gap-1">
                        <button class="btn btn-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                            aria-expanded="false" aria-controls="collapseExample">
                            Agregar Producto
                        </button>
                    </p>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body bg-secondary border-secondary">
                            <!-- add product form -->
                            <form method="post" action="{{ route('admin-products.create') }}">
                                @csrf
                                @method('post')
                                <div class="mb-3">
                                    <label for="InputNombre" class="form-label text-white font-weight-bold">Nombre</label>
                                    <input name="nombre" type="text"
                                        class="text-white form-control bg-secondary border-dark" id="InputNombre"
                                        placeholder="Nombre del producto" />
                                </div>
                                <div class="mb-3">
                                    <label for="InputAutor" class="form-label text-white font-weight-bold">Precio</label>
                                    <input name="precio" type="number"
                                        class="text-white form-control bg-secondary border-dark" id="InputPrecio"
                                        placeholder="Precio del producto" step="any" pattern="^\d*(\.\d{1,2})?$" />
                                </div>
                                <button type="submit" class="btn btn-dark">Crear</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @elseif (auth()->user()->role == 'proveedor')
            <div class="mt-5">
                <div class="row">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $producto)
                                <tr>
                                    <th scope="row">{{ $producto->id }}</th>
                                    <td>{{ $producto->nombre }}</td>
                                    <td>{{ $producto->precio }}</td>
                                    <td class="d-flex flex-row">
                                        <a href="{{ route('provider-products.edit', ['producto' => $producto]) }}"> <span
                                                class="px-2"> <i class="fa-solid fa-pen-to-square"
                                                    style="color: #ffffff;"></i>
                                            </span> </a>
                                        <form method="post"
                                            action="{{ route('provider-products.delete', ['producto' => $producto]) }}">
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

                <!-- Display pagination links -->
                {{ $productos->links() }}

                <!-- Collapse -->
                <div class="row mt-2">
                    <p class="d-inline-flex gap-1">
                        <button class="btn btn-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                            aria-expanded="false" aria-controls="collapseExample">
                            Agregar Producto
                        </button>
                    </p>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body bg-secondary border-secondary">
                            <!-- add product form -->
                            <form method="post" action="{{ route('provider-products.create') }}">
                                @csrf
                                @method('post')
                                <div class="mb-3">
                                    <label for="InputNombre" class="form-label text-white font-weight-bold">Nombre</label>
                                    <input name="nombre" type="text"
                                        class="text-white form-control bg-secondary border-dark" id="InputNombre"
                                        placeholder="Nombre del producto" />
                                </div>
                                <div class="mb-3">
                                    <label for="InputAutor" class="form-label text-white font-weight-bold">Precio</label>
                                    <input name="precio" type="number"
                                        class="text-white form-control bg-secondary border-dark" id="InputPrecio"
                                        placeholder="Precio del producto" step="any" pattern="^\d*(\.\d{1,2})?$" />
                                </div>
                                <button type="submit" class="btn btn-dark">Crear</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @elseif (auth()->user()->role == 'usuario')
            <div class="mt-5">
                <div class="row">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Vendedor</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Comprar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $producto)
                                <tr>
                                    <th scope="row">{{ $producto->id }}</th>
                                    <td>{{ $producto->nombre }}</td>
                                    <td>{{ $producto->user->name }}</td>
                                    <td>{{ $producto->precio }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('user-shop.addToCart', ['producto' => $producto]) }}">
                                            @csrf
                                            @method('POST')
                                            <button type="submit" class="btn text-white">Comprar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Display pagination links -->
                    {{ $productos->links() }}
                </div>
            </div>
        @endif
    @endauth
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        .form-control::placeholder {
            /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: white;
            opacity: 1;
            /* Firefox */
        }

        .form-control:-ms-input-placeholder {
            /* Internet Explorer 10-11 */
            color: white;
        }

        .form-control::-ms-input-placeholder {
            /* Microsoft Edge */
            color: white;
        }
    </style>
@endsection
