@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        Agregar Asesor
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('asesorempresas.store')}}">
                            @csrf

                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input required name="nombre" type="text" class="form-control" id="nombre" aria-describedby="nombre">
                            </div>


                            <div class="mb-3">
                                <label for="app" class="form-label">Apellido Paterno</label>
                                <input required name="app" type="text" class="form-control" id="app" aria-describedby="app">
                            </div>

                            <div class="mb-3">
                                <label for="apm" class="form-label">Apellido Materno</label>
                                <input name="apm" type="text" class="form-control" id="apm" aria-describedby="apm">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input required name="email" type="text" class="form-control" id="email" aria-describedby="email">
                            </div>
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input required name="telefono" type="text" class="form-control" id="telefono" aria-describedby="telefono">
                            </div>

                            <div class="mb-3">
                                <label for="empresa_id" class="form-label">Empresa</label>
                                <select class="form-select" name="empresa_id" id="empresa_id">
                                    <option selected>Elige una empresa</option>
                                    @foreach ($empresas as $empresa)
                                        <option value="{{$empresa->id}}">{{$empresa->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
