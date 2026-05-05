@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">

         <div class="card">
  <div class="card-header">
    <span class="fs-3">Editar Línea de Investigación</span>
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
            <label for="programa" class="form-label">Programa Educativo</label>
            <select class="form-select" name="programa_id">
                <option>Selecciona un programa</option>
                @foreach ( $programas as $programa )
                    @if($programa->id == $linea->programa_id)
                        <option selected value="{{$programa->id}}">{{$programa->nombre}}</option>
                    @else
                        <option value="{{$programa->id}}">{{$programa->nombre}}</option>
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
