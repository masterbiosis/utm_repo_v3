@extends('layouts.app')
@section('title', 'Documentos')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    Crear Documento
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('documentos.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título</label>
                            <input required name="titulo" type="text" class="form-control" id="titulo" aria-describedby="titulo">
                            @error('titulo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="introduccion" class="form-label">Introducción</label>
                            <textarea required name="introduccion" aria-describedby="introduccion" class="form-control" id="introduccion"></textarea>

                        </div>
                        <div class="mb-3">
                            <label for="resumen" class="form-label">Resumen</label>
                            <textarea required name="resumen" aria-describedby="resumen" class="form-control" id="resumen"></textarea>

                        </div>
                        <div class="mb-3">
                            <label for="fecha_presentacion" class="form-label">Fecha de presentación</label>
                            <input required name="fecha_presentacion" type="date" class="form-control" id="fecha_presentacion" aria-describedby="fecha_presentacion">
                            @error('fecha_presentacion')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="alumno_id" class="form-label">Alumno</label>
                            <select class="form-select" name="alumno_id" required>
                                <option selected disabled>Selecciona un alumno</option>
                                @foreach ($alumnos as $alumno)
                                    <option value="{{ $alumno->id }}">{{ $alumno->nombre }} {{ $alumno->apellidop }} {{ $alumno->apellidom }} ({{ $alumno->matricula }})</option>
                                @endforeach
                            </select>
                            @error('alumno_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="programa_id" class="form-label">Programa</label>
                            <select class="form-select" name="programa_id" required>
                                <option selected disabled>Selecciona el programa</option>
                                @foreach ($programas as $programa)
                                    <option value="{{ $programa->id }}">{{ $programa->nombre }}</option>
                                @endforeach
                            </select>
                            @error('programa_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="asesor_id" class="form-label">Asesor externo</label>
                            <select class="form-select" name="asesor_id" required>
                                <option selected disabled>Selecciona un asesor externo</option>
                                @foreach ($asesors as $asesor)
                                    <option value="{{ $asesor->id }}">{{ $asesor->nombre }} {{ $asesor->apellidop }} {{ $asesor->apellidom }}</option>
                                @endforeach
                            </select>
                            @error('asesor_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="director_tesi_id" class="form-label">Director de documento</label>
                            <select class="form-select" name="director_tesi_id" required>
                                <option selected disabled>Selecciona un director de documento</option>
                                @foreach ($directortesis as $directortesi)
                                    <option value="{{ $directortesi->id }}">{{ $directortesi->nombre }} {{ $directortesi->apellido }}</option>
                                @endforeach
                            </select>
                            @error('director_tesi_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                                <label class="form-label">Líneas de investigación</label>
                                <div class="checkbox-group">
                                    @foreach ($lineas as $linea)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="lineas[]" value="{{ $linea->id }}"
                                                id="linea_{{ $linea->id }}"
                                                {{ in_array($linea->id, old('lineas', isset($documento) ? $documento->lineas->pluck('id')->toArray() : [])) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="linea_{{ $linea->id }}">
                                                {{ $linea->nombre }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                @error('lineas')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                @error('lineas.*')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        <div class="mb-3">
                            <label for="archivo_pdf" class="form-label">Subir documento PDF</label>
                            <input type="file" class="form-control" name="archivo_pdf" id="archivo_pdf" accept="application/pdf" required>
                            @error('archivo_pdf')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection