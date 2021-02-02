@extends('master.master')
@if (isset($error))
    
    @section('title')
        Editar web {{ $id }}
    @endsection

    @section('header')
        <h1>No se puede editar la web #{{ $id }}</h1>
        <h2>No se ha encontrado ,a web</h2>
    @endsection

    @section('content')
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-danger fade show">
                    <strong>¡No se puede editar!</strong> No existe ninguna web con id <strong>#{{ $id }}</strong>. <a href="/web/create" class="alert-link">Prueba a crearla.</a>
                </div>
            </div>
        </div>
    @endsection

@else
    
    @section('title')
        Editar web {{ $web->id }}
    @endsection

    @section('header')
        <h1>Editar web #{{ $web->id }}</h1>
        <h2>Rellena el formulario para editar los datos de la web</h2>
    @endsection

    @section('content')
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
                  </div>
              </div>
            </div>
          </div>
        <div class="col-sm-6">
            <form action="/web/{{ $web->id }}" method="POST" class="was-validated" style="width: 100%">

                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="url">URL:</label>
                    <input type="url" name="url" id="url" class="form-control" placeholder="http://www.example.com" value="{{ $web->url }}" required />
                </div>
                <div class="form-group">
                    <label for="domain">Dominio:</label>
                    <input type="text" name="domain" id="domain" class="form-control" value="{{ $web->domain }}" placeholder="Dominio" required />
                </div>
                <div class="form-group">
                    <label for="description">Descripción:</label>
                    <textarea name="description" id="description" class="form-control" placeholder="Descripción" rows="3" required>{{ $web->description }}</textarea>
                </div>

                <div class="row">
                    <div class="col text-left">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-edit"></i>
                        </button>
                    </div>
                    <div class="col text-right">

                        <!-- BOTÓ QUE OBRE EL MODAL DE CONFIRMACIÓ -->
                        <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#deleteModal">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
      </div>

      <!-- MODAL DE CONFIRMACIÓ -->
      <div class="modal fade" id="deleteModal">
        <div class="modal-dialog">
          <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Eliminar web <strong>#{{ $web->id }}</strong></h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
      
            <!-- Modal body -->
            <div class="modal-body">
              ¿Estás seguro que quieres eliminar la web <strong>{{ $web->domain }}</strong>, con id <strong>{{ $web->id }}</strong>?
            </div>
      
            <!-- Modal footer -->
            <div class="modal-footer">
                <form action="/web/{{ $web->id }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Eliminar</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
      
          </div>
        </div>
      </div>
    @endsection

@endif