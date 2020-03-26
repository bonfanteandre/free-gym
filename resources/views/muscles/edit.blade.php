@extends('layout')

@section('title', 'Músculos')

@section('content')

    <h1 class="h3 mb-2 text-gray-800">Cadastro de músculo</h1>
    <p class="mb-4">Preencha o formulário para salvar os dados do músculo.</p>
    <p><small>Campos marcados com * são obrigatórios.</small></p>

    @include('errors')

    <form method="POST" action="/muscles/store">
        @csrf

        <div class="form-group">
            <label for="nome"><strong>Nome *</strong></label>
            <input type="text" name="name" class="form-control" id="nome" placeholder="Bíceps, trícpes, dorsal, ...">
        </div>

        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Salvar</button>

    </form>

@endsection
