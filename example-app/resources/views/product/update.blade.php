@extends('auth.layout')

@section('content')
    @auth
        @if (auth()->user()->role == "administrador")
            <div class="mt-5">
                <h2 class="my-2"> Editar Producto </h2>
                <form method="post" action="{{ route('admin-products.update', ['producto' => $producto]) }}">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="InputNombre" class="form-label text-white font-weight-bold">Nombre</label>
                        <input name="nombre" type="text" class="text-white form-control bg-secondary border-dark"
                            id="InputNombre" value="{{ $producto->nombre }}" />
                    </div>
                    <div class="mb-3">
                        <label for="InputAutor" class="form-label text-white font-weight-bold">Precio</label>
                        <input name="precio" type="number" class="text-white form-control bg-secondary border-dark"
                            id="InputPrecio" value="{{ $producto->nombre }}" step="any" pattern="^\d*(\.\d{1,2})?$" />
                    </div>
                    <button type="submit" class="btn btn-dark">Editar</button>
                </form>
            </div>
        @elseif (auth()->user()->role == 'proveedor')
            <div class="mt-5">
                <h2 class="my-2"> Editar Producto </h2>
                <form method="post" action="{{ route('provider-products.update', ['producto' => $producto]) }}">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="InputNombre" class="form-label text-white font-weight-bold">Nombre</label>
                        <input name="nombre" type="text" class="text-white form-control bg-secondary border-dark"
                            id="InputNombre" value="{{ $producto->nombre }}" />
                    </div>
                    <div class="mb-3">
                        <label for="InputAutor" class="form-label text-white font-weight-bold">Precio</label>
                        <input name="precio" type="number" class="text-white form-control bg-secondary border-dark"
                            id="InputPrecio" value="{{ $producto->nombre }}" step="any" pattern="^\d*(\.\d{1,2})?$" />
                    </div>
                    <button type="submit" class="btn btn-dark">Editar</button>
                </form>
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
