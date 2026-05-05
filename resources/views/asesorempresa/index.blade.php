@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.3/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.6/css/responsive.bootstrap5.css">
@endsection
@section('title', 'Asesores')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-11">
                <span class="fs-3">Asesores Empresariales</span>
            </div>
            <div class="col-1">
                <a class="btn btn-primary" href="{{ route('asesorempresas.create') }}">Nuevo</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <table id="asesorempresatbl" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NOMBRE</th>
                                    <th>AP. PATERNO</th>
                                    <th>AP. MATERNO</th>
                                    <th>CORREO</th>
                                    <th>TELEFONO</th>
                                    <th>EMPRESA</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($asesores as $asesor)
                                    <tr>
                                        <td>{{ $asesor->id }}</td>
                                        <td>{{ $asesor->nombre }}</td>
                                        <td>{{ $asesor->app }}</td>
                                        <td>{{ $asesor->apm }}</td>
                                        <td>{{ $asesor->email }}</td>
                                        <td>{{ $asesor->telefono }}</td>
                                        <td>{{ $asesor->empresa->nombre }}</td>
                                        <td><a class="btn btn-success"
                                                href="{{ route('asesorempresas.edit', ['asesorempresa' => $asesor->id]) }}">Modificar</a>
                                        </td>
                                        <td>
                                            <form id="frm-borrar-{{ $asesor->id }}" method="POST"
                                                action="{{ route('asesorempresas.destroy', ['asesorempresa' => $asesor->id]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <script type="module">
                                        $("#frm-borrar-{{ $asesor->id }}").submit(function(e) {
                                            //alert('SUBMIT OK');
                                            e.preventDefault();

                                            //////////////////////////////auth
                                            Swal.fire({
                                                title: "Estas seguro?",
                                                text: "No se podrá revertir!",
                                                icon: "warning",
                                                showCancelButton: true,
                                                confirmButtonColor: "#3085d6",
                                                cancelButtonColor: "#d33",
                                                confirmButtonText: "Si, borrar!"
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    /*
                                                    Swal.fire({
                                                    title: "Deleted!",
                                                    text: "Your file has been deleted.",
                                                    icon: "success"
                                                    });
                                                    */
                                                    this.submit();
                                                }
                                            });

                                            /////////////////////////////auth

                                        }); //fin SUBMIT
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
        new DataTable('#asesorempresatbl', {
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
    </script>
@endsection
