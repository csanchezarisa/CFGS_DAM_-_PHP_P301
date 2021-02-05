@extends('layouts.master')

@if (isset($error))
    
  @section('title')
    Web {{ $id }} no encontrada
  @endsection

  @section('header')
      <h1>Web {{ $id }} no encontrada</h1>
  @endsection

  @section('content')
    <div class="row">
      <div class="col-sm-12">
          <div class="alert alert-danger fade show">
              <strong>¡Sin resultados!</strong> No existe ninguna web con id <strong>{{ $id }}</strong>. <a href="/web/create" class="alert-link">Prueba a crearla</a>.
          </div>
      </div>
    </div>
  @endsection

@else
    
  @section('title')
    Web {{ $web->id }}
  @endsection

  @section('header')
    <h1>Mejores webs de internet</h1>
    <h2>Web {{ $web->id }}</h2>
    <h3>{{ $web->domain }}</h3>
  @endsection

  @section('content')
    @if (isset($updated))
        <div class="row">
          <div class="col-sm-12">

            @if ($updated)
              <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>¡Éxito!</strong> Se ha editado correctamente la web.
              </div>    
            @else
              <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>¡Error!</strong> No se ha editar la web. Pruébalo de nuevo.
              </div>
            @endif

          </div>
        </div>
    @endif

    <div class="row">
      <div class="col-sm-6">
        <div class="card bg-light text-center" style="width:100%">
          <div class="card-header">
            <img class="card-img-top" src="{{ URL::to('/') }}/images/favicon.png" alt="Web image">
            <h4 class="card-title">Web #{{ $web->id }}</h4>
          </div>
          <div class="card-body">
            <h5 class="card-text">{{ $web->domain }}</h5>
            <p class="card-text">{{ $web->description }}</p>
          </div>
          <div class="card-footer">
            <p>Enlace a la web: <a href="{{ $web->url }}" target="_blank">{{ $web->url }}</a></p>
              <div class="text-right">
                <a href="/web/{{ $web->id }}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
              </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <h4>Resumen de la web</h4>
        <ul>
          <li>
            <strong>#ID:</strong> {{ $web->id }}
          </li>
          <li>
            <strong>Dominio:</strong> {{ $web->domain }}
          </li>
          <li>
            <strong>Descripción:</strong> {{ $web->description }}
          </li>
          <li>
            <strong>URL:</strong> <a href="{{ $web->url }}" target="_blank">{{ $web->url }}</a>
          </li>
        </ul>
      </div>
    </div>
  @endsection

@endif