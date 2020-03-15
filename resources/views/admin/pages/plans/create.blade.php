@extends('adminlte::page')

@section('title', 'Cadastrar Plano')

@section('content_header')
    <h1>Cadastrar Plano</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('plans.store') }}" class="form" method="post">
            @csrf
            <div class="form-group">
                <label>Nome:</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label>Preço:</label>
                <input type="text" name="price" class="form-control">
            </div>
            <div class="form-group">
                <label>Descrição:</label>
                <input type="text" name="description" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-sm">Enviar</button>
            </div>
        </form>
    </div>
  </div>
@stop
