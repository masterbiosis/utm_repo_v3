@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        Editar Sudirector de Carrera
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('subdirectors.update',['subdirector'=>$subdirector->id])}}">
                            @method('PUT')
                            @csrf

                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input value="{{$subdirector->nombre}}"" required name="nombre" type="text" class="form-control" id="nombre" aria-describedby="nombre">
                            </div>


                            <div class="mb-3">
                                <label for="app" class="form-label">Apellido Paterno</label>
                                <input value="{{$subdirector->app}}" required name="app" type="text" class="form-control" id="app" aria-describedby="app">
                            </div>

                            <div class="mb-3">
                                <label for="apm" class="form-label">Apellido Materno</label>
                                <input value="{{$subdirector->apm}}" name="apm" type="text" class="form-control" id="apm" aria-describedby="apm">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input value="{{$subdirector->email}}" required name="email" type="text" class="form-control" id="email" aria-describedby="email">

                            </div>
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input value="{{$subdirector->telefono}}" required name="telefono" type="text" class="form-control" id="telefono" aria-describedby="telefono">

                            </div>

                            <div class="mb-3">

                                <select class="form-select" name="carrera_id">
                                    <option selected>Elige una carrera</option>
                                    @foreach ($carreras as $carrera)
                                        @if ($carrera->id == $subdirector->carrera_id)
                                            <option selected value="{{$carrera->id}}">{{$carrera->nombre}}</option>
                                        @else
                                            <option value="{{$carrera->id}}">{{$carrera->nombre}}</option>
                                        @endif
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
