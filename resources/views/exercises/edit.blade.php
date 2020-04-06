@extends('layout')

@section('title', 'Exercícios')

@section('content')

    <h1 class="h3 mb-2 text-gray-800">Cadastro de exercício</h1>
    <p class="mb-4">Preencha o formulário para salvar os dados do exercício.</p>
    <p><small>Campos marcados com * são obrigatórios.</small></p>

    @include('errors')

    <form method="POST" action="/exercises/{{ $exercise->id }}">
        @method('PATCH')
        @csrf

        <div class="form-group">
            <label for="nome"><strong>Nome *</strong></label>
            <input type="text" name="name" class="form-control" id="nome" value="{{ $exercise->name }}" placeholder="Supino, agachamento, ...">
        </div>

        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea class="form-control" name="description" id="description">{{ $exercise->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Atualizar</button>

    </form>

@endsection
