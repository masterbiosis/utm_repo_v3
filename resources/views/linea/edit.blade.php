@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-9">

         <div class="card">
  <div class="card-header">
    Crear Linea
  </div>
  <div class="card-body">
    
      <form method="POST" action="{{route('lineas.update',['linea'=>$linea->id])}}">
        @method('PUT')
        @csrf
           <div class="mb-3">
               <label for="nombre" class="form-label">Nombre</label>
                  <input required name="nombre" type="text" class="form-control" id="nombre" aria-describedby="nombre" value="{{$linea->nombre}}">
              
          </div>
          <div class="mb-3">
                 <label for="descripcion" class="form-label">Descricion</label>
                  <input required name="descripcion" type="text" class="form-control" id="descripcion" aria-describedby="descripcion" value="{{$linea->descripcion}}">
                    
              
          </div>
          <div class="mb-3">
                        
                        <select class="form-select" name="progrma_id" disabled>
                            <option selected>Selecciona un programa</option>
                            @foreach ( $programas as $programa )
                            
                            <option value="{{$programa->id}}">{{$programa->nombre}}</option>
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