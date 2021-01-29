@extends('master.master')

@section('title')
    Listado de coches disponibles
@endsection

@section('active-vercoches')
    active
@endsection

@section('header')
    <h1>Coches disponibles</h1>
    <h2>Listado con los coches disponibles</h2>
    <h5>Click para ver información, doble click para editar</h5>
@endsection

@section('content')
    <table class="table table-responsive-sm table-striped table-hover">
        <tr class="text-center">
            <th>#</th>
            <th>URL</th>
            <th>Dominio</th>
            <th>Descripción</th>
        </tr>

        <!-- BUCLE QUE PINTA LES LINIES DE LA TAULA AMB LA INFORMACIÓ DELS COTXES -->
        @foreach ($webs as $web)
            <tr onclick="cocheSeleccionado({{ $web->id }})" ondblclick="editarCoche({{ $web->id }})">
                <td>{{ $web->id }}</td>
                <td>{{ $web->url }}</td>
                <td>{{ $web->domain }}</td>
                <td>{{ $web->description }}</td>
            </tr>
        @endforeach

    </table>
    <script>
        function cocheSeleccionado(id) {
            window.location = "/coche/" + id;
        }

        function editarCoche(id) {
            window.location = "/coche/" + id + "/edit";
        }
    </script>
@endsection