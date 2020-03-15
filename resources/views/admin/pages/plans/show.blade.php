@extends('adminlte::page')

@section('title', 'Detalhes do plano { $plan->name }')

@section('content_header')
<h1>Detalhes do plano</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <ul>
            <li>
                <strong>Nome:</strong> {{ $plan->name }}
            </li>
            <li>
                <strong>Preço:</strong> {{ number_format($plan->price, 2, ',','.') }}
            </li>
            <li>
                <strong>Descrição:</strong> {{ $plan->description }}
            </li>
        </ul>
    </div>
    <div class="card-footer">
        <form action="{{ route('plans.destroy', $plan->url) }}" method="POST">
            @csrf
            @method("DELETE")
        <button type="submit" class="btn btn-danger">Excluir {{ $plan->name }}</button>
        </form>
    </div>
  </div>
@stop
