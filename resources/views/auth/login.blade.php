@extends('layouts.app')
@section('css')
    @vite(['resources/css/styles.css'])
@endsection
@section('content')
    <div class="container-fluid p-3 vh-100">
        <div class="row">
            <div class="col p-4">
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-6 pt-6 col w-full d-flex flex-column align-items-center">

                        <div class="col bg-white p-4 shadow-lg">
                            <div class="col d-flex justify-content-center">
                                <img style="width: 25%" class="image-fluid" src="{{ asset('storage/images/utm_logo.png') }}"
                                    alt="UTM">
                            </div>
                            <div class="col ">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="email" class="form-label">{{ __('Correo Electrónico') }}</label>
                                        <div class="col-md-12">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">{{ __('Password') }}</label>
                                        <div class="col-md-12">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                required autocomplete="current-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 form-check d-flex justify-content-between">
                                        <div class="">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Recordar') }}
                                            </label>
                                        </div>

                                        {{-- Inicia --}}
                                        <div class="">
                                            @if (Route::has('password.request'))
                                                <a class="btn link" href="{{ route('password.request') }}">
                                                    {{ __('¿Olvidaste la cointraseña?') }}
                                                </a>
                                            @endif
                                        </div>
                                        {{-- FIN --}}
                                    </div>


                                    <button type="submit" class="btn btn-blue  w-100">{{ __('Iniciar Sesión') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
