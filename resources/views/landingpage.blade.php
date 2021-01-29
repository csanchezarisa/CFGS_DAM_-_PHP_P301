@extends('master.master')

@section('title')
    Top mejores webs - Inicio
@endsection

@section('header')
  <h1>Mejores webs de internet</h1>
  <h2>Disfruta de las mejores webs de internet</h2>
  <h6>no solo de las dirigidas a adultos...</h6>
@endsection

@section('content')
    @if (session('deleted'))
      <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-success alert-dismissible fade show">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>¡Éxito!</strong> Se ha eliminado la web correctamente.
            </div>
        </div>
      </div>
    @endif

    @if (session('not_deleted'))
      <div class="row">
        <div class="col-sm-12">
          <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡Error!</strong> No se ha podido eliminar la web. Pruébalo de nuevo.
          </div>
        </div>
      </div>
    @endif
    <div class="text-center">
      <img src="https://media1.giphy.com/media/L8K62iTDkzGX6/giphy.gif" alt="Web" width="75%" />
    </div>
@endsection