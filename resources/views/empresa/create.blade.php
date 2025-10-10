@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">

         <div class="card">
  <div class="card-header">
    Crear Linea
  </div>
  <div class="card-body">
    
      <form method="POST" action="{{route('empresas.store')}}">
        @csrf
           <div class="mb-3">
               <label for="nombre" class="form-label">Nombre</label>
                  <input required name="nombre" type="text" class="form-control" id="nombre" aria-describedby="nombre">
               </div>
          <div class="mb-3">
                 <label for="direccion" class="form-label">Direccion</label>
                  <input required name="direccion" type="text" class="form-control" id="direccion" aria-describedby="direccion">
                    </div>
                     <div class="mb-3">
                 <label for="email" class="form-label">Email</label>
                  <input required name="email" type="text" class="form-control" id="email" aria-describedby="email">
                    </div>
                     <div class="mb-3">
                 <label for="telefono" class="form-label">Telefono</label>
                  <input required name="telefono" type="text" class="form-control" id="telefono" aria-describedby="telefono">
                    </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </form>
  </div>
</div>
        </div>
    </div>
</div>

@endsection