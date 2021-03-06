@include('admin.includes.alerts')

<div class="form-group">
    <label>Nome:</label>
<input type="text" name="name" class="form-control" value="{{ $plan->name ?? old('name') }}">
</div>
<div class="form-group">
    <label>Preço:</label>
    <input type="text" name="price" class="form-control" value="{{ $plan->price ?? old('price') }}">
</div>
<div class="form-group">
    <label>Descrição:</label>
    <input type="text" name="description" class="form-control" value="{{ $plan->description ?? old('description') }}">
</div>
<div class="form-group text-right">
<a href="{{ route('plans.index') }}" class="btn btn-primary btn-sm">Voltar</a>
    <button type="submit" class="btn btn-success btn-sm">Enviar</button>
</div>
