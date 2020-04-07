@extends('layout')

@section('title', 'Planos')

@section('content')

    <h1 class="h3 mb-2 text-gray-800">Cadastro de plano</h1>
    <p class="mb-4">Preencha o formulário para criar um novo plano.</p>
    <p><small>Campos marcados com * são obrigatórios.</small></p>

    @include('errors')

    <form method="POST" action="/plans">
        @csrf

        <div class="form-group">
            <label for="nome"><strong>Nome *</strong></label>
            <input type="text" name="name" class="form-control" id="nome" placeholder="Livre, 3 vezes por semana, ..." value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label for="price"><strong>Preço (R$)*</strong></label>
            <input type="text" name="price" class="form-control" id="price" placeholder="80" value="{{ old('price') }}">
        </div>

        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea class="form-control" name="description" id="description">{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Salvar</button>

    </form>

@endsection
