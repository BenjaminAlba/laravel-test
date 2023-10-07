@extends('auth.layout')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header bg-dark text-white">Register</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6 d-flex align-items-center justify-content-center ">
                            <img src="{{ asset('storage/img/aether_logo_big.png') }}" class="align-middle img-fluid object-fit-scale"
                                alt="logo">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <form action="{{ route('store') }}" method="post">
                                @csrf
                                <div class="mb-3 row-col">
                                    <label for="name"
                                        class="col-form-label text-md-end text-start">Name</label>
                                    <div class="">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" value="{{ old('name') }}">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row-col">
                                    <label for="email" class="col-form-label text-md-end text-start">Email
                                        Address</label>
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
                                        class="col-form-label text-md-end text-start">Password</label>
                                    <div class="">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            id="password" name="password">
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row-col">
                                    <label for="password_confirmation"
                                        class="col-form-label text-md-end text-start">Confirm Password</label>
                                    <div class="">
                                        <input type="password" class="form-control" id="password_confirmation"
                                            name="password_confirmation">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Register">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
