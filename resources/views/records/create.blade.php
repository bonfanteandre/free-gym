@extends('layout')

@section('title', 'Ficha de treino')

@section('content')

    <h1 class="h3 mb-2 text-gray-800">Cadastro de ficha de treino</h1>
    <p class="mb-4">Preencha o formulário para criar uma nova ficha de treino.</p>
    <p><small>Campos marcados com * são obrigatórios.</small></p>

    @include('errors')

    <form method="POST" action="/records">
        @csrf

        <div class="form-group">
            <label for="name"><strong>Nome *</strong></label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Primeiro treino, Treino para emagrecer, ..." value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label for="expiration"><strong>Validade *</strong></label>
            <input type="text" name="expiration" class="form-control" id="expiration" placeholder="00/00/0000" value="{{ old('expiration') }}">
        </div>

        <div class="form-group">
            <label for="client"><strong> Cliente *</strong></label>
            <select name="client_id" id="client" class="form-control">
                <option value="" selected>Selecione o cliente</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="instructor"><strong>Instrutor *</strong></label>
            <input type="text" class="form-control" id="instructor" name="instructor" value="{{ $instructor->name }}" readonly disabled>
            <input type="hidden" name="user_id" value="{{ $instructor->id }}">
        </div>

        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Salvar</button>

    </form>

@endsection
