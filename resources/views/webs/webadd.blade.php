@extends('layouts.master')

@section('title')
    Registrar nueva web
@endsection

@section('active-insertarcoche')
    active
@endsection

@section('header')
    <h1>Registrar nueva web</h1>
    <h2>Rellena el siguiente formulario para introducir una nueva web</h2>
@endsection

@section('content')

    @if (session('errorCreating'))
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-danger alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>¡Error!</strong> No se ha podido crear la web. Pruébalo de nuevo.
                </div>
            </div>
        </div>   
    @endif
    
    <div class="row">
        <div class="col-sm-12">
            <form action="/web" method="post" class="was-validated" style="width: 100%;">

                @csrf

                <div class="form-group">
                    <label for="url">URL:</label>
                    <input type="url" name="url" id="url" class="form-control" placeholder="http://www.example.com" required />
                </div>
                <div class="form-group">
                    <label for="domain">Dominio:</label>
                    <input type="text" name="domain" id="domain" class="form-control" placeholder="Dominio" required />
                </div>
                <div class="form-group">
                    <label for="description">Modelo:</label>
                    <textarea name="description" id="description" class="form-control" placeholder="Descripción" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-dark">
                    <i class="fas fa-plus-circle"></i>
                </button>
            </form>
        </div>
    </div>
@endsection