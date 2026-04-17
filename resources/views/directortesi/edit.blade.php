@extends('layouts.app')
@section('css')
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">

         <div class="card">
  <div class="card-header">
    <span class="fs-3">Editar Director de Tesis/Tesina</span>
  </div>
  <div class="card-body">

      <form method="POST" action="{{route('directortesis.update',['directortesi'=>$directortesi->id])}}">
        @method('PUT')
        @csrf
           <div class="mb-3">
               <label for="nombre" class="form-label">Nombre</label>
                  <input required name="nombre" type="text" class="form-control" id="nombre" aria-describedby="nombre" value="{{$directortesi->nombre}}">
               </div>
          <div class="mb-3">
                 <label for="apellidop" class="form-label">Apellido Paterno</label>
                  <input required name="apellidop" type="text" class="form-control" id="apellidop" aria-describedby="apellidop" value="{{$directortesi->apellidop}}">
                    </div>
                    <div class="mb-3">
                 <label for="apellidom" class="form-label">Apellido Materno</label>
                  <input required name="apellidom" type="text" class="form-control" id="apellidom" aria-describedby="apellidom" value="{{$directortesi->apellidom}}">
                    </div>
                     <div class="mb-3">
                 <label for="email" class="form-label">Email</label>
                  <input required name="email" type="text" class="form-control" id="email" aria-describedby="email" value="{{$directortesi->email}}">
                    </div>
                     <div class="mb-3">
                 <label for="telefono" class="form-label">Telefono</label>
                  <input required name="telefono" type="text" class="form-control" id="telefono" aria-describedby="telefono" value="{{$directortesi->telefono}}">
                    </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </form>
  </div>
</div>
        </div>
    </div>
</div>

@endsection
