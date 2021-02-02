@extends('master.master')

@section('title')
    Listado de webs registradas
@endsection

@section('active-vercoches')
    active
@endsection

@section('header')
    <h1>Webs registradas</h1>
    <h2>Listado con las webs registradas</h2>
    <h5>Click para ver información, doble click para editar</h5>
@endsection

@section('content')
    <table class="table table-responsive-sm table-striped table-hover">
        <tr class="text-center">
            <th>Dominio</th>
            <th>URL</th>
        </tr>

        <!-- BUCLE QUE PINTA LES LINIES DE LA TAULA AMB LA INFORMACIÓ DELS COTXES -->
        @foreach ($webs as $web)
            <tr onclick="webSeleccionada({{ $web->id }})" ondblclick="editarWeb({{ $web->id }})" role="button">
                <td>{{ $web->domain }}</td>
                <td>
                    <a href="{{ $web->url }}" target="_blank">
                        {{ $web->url }}
                    </a>
                </td>
            </tr>
        @endforeach

    </table>
    <script>
        function webSeleccionada(id) {
            window.location = "/web/" + id;
        }

        function editarWeb(id) {
            window.location = "/web/" + id + "/edit";
        }
    </script>
@endsection