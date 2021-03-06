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
            @include('admin.pages.plans.form.form')
        </form>
    </div>
  </div>
@stop
