@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Planos <a href="{{ route('plans.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> ADICIONAR PLANO</a></h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
    <form action="{{ route('plans.search') }}" class="form form-inline" method="post">
            @csrf
    <input type="text" name="filter" class="form-control" value="{{ $filters['filter'] ?? '' }}">
            <button type="submit" class="btn btn-dark" >Filtar</button>
        </form>
    </div>
    <div class="card-body">
        @include('admin.includes.alerts')
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
                        <td>R$ {{ number_format($plan->price, 2, ',','.') }}</td>
                        <td>
                            <a href="{{ route('plans.edit', $plan->url) }}" class="btn btn-warning btn-sm">Editar</a>
                            <a href="{{ route('plans.show', $plan->url) }}" class="btn btn-primary btn-sm">Ver</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
    <div class="card-footer">
        @if (isset($filters))
            {!! $plans->appends($filters)->links() !!}
        @else
            {!! $plans->links() !!}
        @endif
    </div>
  </div>
@stop
