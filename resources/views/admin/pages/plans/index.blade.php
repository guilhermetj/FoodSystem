@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Planos</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
    <a href="{{ route('plans.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> ADICIONAR PLANO</a>
    </div>
    <div class="card-body">
        {{-- mensagem de alerta --}}
        @if (session('message'))
            <div class="alert alert-info">
                {{ session('message') }}
            </div>
        @endif
        {{-- fim de mensagem --}}
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Nome</th>
                <th scope="col">Preço</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($plans as $plan)
                    <tr>
                        <td>{{ $plan->name }}</td>
                        <td>{{ $plan->price }}</td>
                        <td>
                            <a href="" class="btn btn-success btn-sm">Detalhes</a>
                            <a href="" class="btn btn-warning btn-sm">Editar</a>
                            <a href="{{ route('plans.show', $plan->url) }}" class="btn btn-primary btn-sm">Ver</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
    <div class="card-footer">
        {!! $plans->links() !!}
    </div>
  </div>
@stop
