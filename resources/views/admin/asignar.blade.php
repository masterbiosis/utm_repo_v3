@extends('layouts.app')
@section('title', 'Asignacion')
@section('content')
    <div class="container">
        <form action="{{ route('admin.asignardata') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col">
                    <h1>Asignación de Director de Tesis</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <h3>Directores de Tesis</h3>
                    <div class="caja">
                        <div class="mb-3">
                            <select name="directortesi" id="directortesi" class="form-select">
                                @foreach ($directortesis as $directortesi)
                                    <option value="{{ $directortesi->id }}">
                                        @if ($directortesi->id == 1)
                                            {{ $directortesi->nombre }}
                                        @else
                                            {{ $directortesi->nombre }}
                                            {{ $directortesi->apellidop }}
                                            {{ $directortesi->apellidom }}
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Asignar</button>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <h3>Alumnos de Postgrado</h3>
                    <div class="mb-3">
                        <div class="card">
                            <div class="card-body">
                                <table id="alumnotbl" class="table table-striped">

                                    <thead>
                                        <tr>
                                            <th>Alumno</th>
                                            <th>Director de Tesis</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($alumnos as $alumno)
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input name="estudiante[]" value="{{ $alumno->id }}"
                                                            class="form-check-input" type="checkbox"
                                                            id="alumno{{ $alumno->id }}">
                                                        {{ $alumno->matricula }}
                                                        {{ $alumno->nombre }}
                                                        {{ $alumno->apellidop }}
                                                        {{ $alumno->apellidom }}
                                                    </div>
                                                </td>
                                                <td>{{ $alumno->directortesi_id != 1 ? $alumno->directortesi->nombre : 'No asignado' }}
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

        </form>
    </div>
    </div>
@endsection

@section('js')
    {{--
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>

--}}
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.3.3/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.3/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.6/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.6/js/responsive.bootstrap5.js"></script>

    <script>
        new DataTable('#alumnotbl', {
            responsive: true,
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
        });
    </script>
@endsection
