@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        Editar Programa
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('programas.update',['programa'=>$programa->id])}}">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input value="{{$programa->nombre}}" required name="nombre" type="text" class="form-control" id="nombre" aria-describedby="nombre">
                            </div>

                            <div class="mb-3">
                                <select class="form-select" name="carrera_id">
                                    <option selected>Elige una carrera</option>
                                    @foreach ($carreras as $carrera)
                                        @if ($carrera->id == $programa->carrera_id)
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
