@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        Agregar Carrera
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('carreras.store')}}">
                            @csrf
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input required name="nombre" type="text" class="form-control" id="nombre" aria-describedby="nombre">

                            </div>

                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
