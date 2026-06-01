@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.3/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.6/css/responsive.bootstrap5.css">
@endsection
@section('title', 'Documentos')
@section('content')
    <div class="container">

        <!-- Mostrar mensaje de éxito si existe -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            <div class="col-11">
                <span class="fs-3">Tesis/Tesina</span>

            </div>
            <div class="col-1">
                <a class="btn btn-primary" href="{{ route('documentos.create') }}">Nuevo</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <table id="documentotbl" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Título</th>
                                    <th>Introducción</th>
                                    <th>Resumen</th>
                                    <th>Matrícula</th>
                                    <th>Alumno</th>
                                    <th>Fecha de presentación</th>
                                    <th>Programa</th>
                                    <th>Asesor externo</th>
                                    <th>Director doc.</th>
                                    <th>Líneas</th>
                                    <th>PDF</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($documentos as $documento)
                                    <tr>
                                        <td>{{ $documento->id }}</td>
                                        <td>{{ $documento->titulo }}</td>
                                        <td>{{ $documento->introduccion }}</td>
                                        <td>{{ $documento->resumen }}</td>
                                        <td>{{ $documento->alumno->matricula }}</td>
                                        <td>{{ $documento->alumno->nombre }} {{ $documento->alumno->apellidop }} {{ $documento->alumno->apellidom }}</td>
                                        <td>{{ $documento->fecha_presentacion }}</td>
                                        <td>{{ $documento->programa->nombre }}</td>
                                        <td>{{ $documento->asesor->nombre }} {{ $documento->asesor->app }} {{ $documento->asesor->apm }}</td>
                                        <td>{{ $documento->directortesi->siglasEstudio}}. {{ $documento->directortesi->nombre }} {{ $documento->directortesi->apellidop}} {{ $documento->directortesi->apellidom}}</td>
                                        <td>
                                            <details>
                                                <summary>Ver</summary>
                                                <ul class="list-group">
                                                    @if ($documento->lineas->isNotEmpty())
                                                        @foreach ($documento->lineas as $linea)
                                                            <li class="list-group-item">{{ $linea->nombre }}</li>
                                                        @endforeach
                                                    @else
                                                        <li class="list-group-item">Sin líneas</li>
                                                    @endif
                                                </ul>
                                            </details>
                                        </td>
                                        <td>
                                            @if ($documento->archivo_pdf)
                                                <a class="btn btn-success"  href="{{ asset('storage/' . $documento->archivo_pdf) }}"
                                                    target="_blank">PDF</a>
                                            @else
                                                Sin PDF
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#{{$documento->id}}">
                                                Mostrar
                                            </button>
                                        </td>
                                        <td>
                                            <a class="btn btn-success"
                                                href="{{ route('documentos.edit', ['documento' => $documento->id]) }}">Modificar</a>
                                        </td>
                                        <td>
                                            <form id="frm-borrar-{{ $documento->id }}" method="POST"
                                                action="{{ route('documentos.destroy', ['documento' => $documento->id]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="{{$documento->id}}" tabindex="-1" aria-labelledby="documentoModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="documentoModalLabel">{{$documento->titulo}}</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h5 class="card-title">Alumno</h5>
                                                        <p class="text-muted">{{$documento->alumno->matricula}} {{ $documento->alumno->nombre }} {{ $documento->alumno->apellidop }} {{ $documento->alumno->apellidom }}</p>

                                                        <h5 class="card-title">Reusmen</h5>
                                                        <p class="text-muted">{{$documento->resumen}}</p>

                                                        <h5 class="card-title">Introducción</h5>
                                                        <p class="text-muted">{{$documento->introduccion}}</p>

                                                        <h5 class="card-title">Fecha de Presentación</h5>
                                                        <p class="text-muted">{{$documento->fecha_presentacion}}</p>

                                                        <h5 class="card-title">Programa Educativo</h5>
                                                        <p class="text-muted">{{$documento->programa->nombre}}</p>

                                                        <h5 class="card-title">Asesor Empresarial</h5>
                                                        <p class="text-muted">{{ $documento->asesor->nombre }} {{ $documento->asesor->app }} {{ $documento->asesor->apm }}</p>

                                                        <h5 class="card-title">Director de Tesis/Tesina</h5>
                                                        <p class="text-muted">{{ $documento->directortesi->siglasEstudio}}. {{ $documento->directortesi->nombre }} {{ $documento->directortesi->apellidop}} {{ $documento->directortesi->apellidom}}</p>

                                                        <h5 class="card-title">Lineas de Investigacion</h5>
                                                        <p class="text-muted">
                                                            <ul class="list-group">
                                                                @if ($documento->lineas->isNotEmpty())
                                                                    @foreach ($documento->lineas as $linea)
                                                                        <li class="list-group-item">{{ $linea->nombre }}</li>
                                                                    @endforeach
                                                                @else
                                                                    <li class="list-group-item">Sin líneas</li>
                                                                @endif
                                                            </ul>
                                                        </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script type="module">
                                        $("#frm-borrar-{{ $documento->id }}").submit(function(e) {
                                            e.preventDefault();
                                            Swal.fire({
                                                title: "¿Estás seguro?",
                                                text: "¡No se podrá revertir!",
                                                icon: "warning",
                                                showCancelButton: true,
                                                confirmButtonColor: "#3085d6",
                                                cancelButtonColor: "#d33",
                                                confirmButtonText: "¡Sí, borrar!"
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    this.submit();
                                                }
                                            });
                                        });
                                    </script>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
        let data = new DataTable('#documentotbl',
        {

            responsive: true,
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 Entradas",
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
        data.column(2).visible(false)
        data.column(3).visible(false)
        data.column(7).visible(false)
        data.column(8).visible(false)
        data.column(9).visible(false)
        data.column(10).visible(false)
    </script>
@endsection
