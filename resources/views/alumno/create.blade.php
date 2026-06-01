@extends('layouts.app')
@section('title','Agregar Alumno')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">

         <div class="card">
  <div class="card-header">
    <span class="fs-3">Agregar Alumno</span>
  </div>
  <div class="card-body">

        <form method="POST" action="{{route('alumnos.store')}}">
            @csrf
            <div class="mb-3">
                <label for="matricula" class="form-label fs-5">Matrícula</label>
                <input name="matricula" type="text" class="form-control" id="matricula" aria-describedby="matricula">
            </div>
            @error('matricula')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="mb-3">
                <label for="nombre" class="form-label fs-5">Nombre</label>
                <input  name="nombre" type="text" class="form-control" id="nombre" aria-describedby="nombre">
            </div>
            <div class="mb-3">
                <label for="apellidop" class="form-label fs-5">Apellido Paterno</label>
                <input  name="apellidop" type="text" class="form-control" id="apellidop" aria-describedby="apellidop">
            </div>
            <div class="mb-3">
                <label for="apellidom" class="form-label fs-5">Apellido Materno</label>
                <input  name="apellidom" type="text" class="form-control" id="apellidom" aria-describedby="apellidom">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label fs-5">Email</label>
                <input  name="email" type="text" class="form-control" id="email" aria-describedby="email">
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label fs-5">Telefono</label>
                <input  name="telefono" type="text" class="form-control" id="telefono" aria-describedby="telefono">
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
  </div>
</div>
        </div>
    </div>
</div>

@endsection
