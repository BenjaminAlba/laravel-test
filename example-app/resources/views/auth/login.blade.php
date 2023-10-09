@extends('auth.layout')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-white">Login</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <img src="{{ asset('storage/img/aether_logo_big.png') }}" class="img-fluid object-fit-scale" alt="logo">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <form action="{{ route('authenticate') }}" method="post">
                                @csrf
                                <div class="mb-3 row-col">
                                    <label for="email" class="col-form-label text-md-end text-start">Correo Electrónico</label>
                                    <div class="">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" value="{{ old('email') }}">
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row-col">
                                    <label for="password"
                                        class="col-form-label text-md-end text-start">Contraseña</label>
                                    <div class="">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            id="password" name="password">
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Login">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
