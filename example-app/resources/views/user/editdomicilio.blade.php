@extends('auth.layout')

@section('content')
    <div class="mt-5">
        <form method="post" action="{{ route('user-info.updatedireccion', ['direccion' => $direccion]) }}">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="InputCalle" class="form-label text-white font-weight-bold">Calle</label>
                <input name="calle" type="text" class="text-white form-control bg-secondary border-dark" id="InputCalle"
                    value="{{ $direccion->calle }}" />
            </div>
            <div class="mb-3">
                <label for="InputNumero" class="form-label text-white font-weight-bold">Número</label>
                <input name="numero" type="number" class="text-white form-control bg-secondary border-dark"
                    id="InputNumero" value="{{ $direccion->numero }}" />
            </div>
            <button type="submit" class="btn btn-dark">Actualizar</button>
        </form>
    </div>
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
