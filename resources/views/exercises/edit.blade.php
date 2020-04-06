@extends('layout')

@section('title', 'Exercícios')

@section('content')

    <h1 class="h3 mb-2 text-gray-800">Cadastro de exercício</h1>
    <p class="mb-4">Preencha o formulário para salvar os dados do exercício.</p>
    <p><small>Campos marcados com * são obrigatórios.</small></p>

    @include('success')
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

    <hr>

    <h3 class="h5 mb-2 text-gray-800">Músculos vinculados</h3>
    <p class="mb-4">Vincule os músculos trabalhados por este exercícios.</p>

    <form method="POST" action="/exercise/{{ $exercise->id }}/muscle">
    
        @csrf

        <div class="form-group">
            <label for="new_muscle" class="control-label">Vincular novo músculo</label>
            <select name="muscle_id" id="new_muscle" class="form-control" required>
                <option value="" selected>Selecione um músculo</option>
                @foreach($muscles as $muscle)
                    <option value="{{ $muscle->id }}">{{ $muscle->name }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary"><i class="fa fa-plus"></i> Vincular</button>
    </form>

    <br>

    @if($exercise->muscles->count() > 0)
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" >
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th style="width: 15%"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($exercise->muscles as $muscle)
                        <tr>
                            <td>{{ $muscle->name }}</td>
                            <td style="width: 15%" class="text-center">
                                <form method="POST" action="/exercise/{{ $exercise->id }}/muscle/{{ $muscle->id }}" onsubmit="return confirm('Tem certeza que deseja desvincular este músculo?')">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i> Desvincular
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="alert alert-info">Nenhum músculo foi vinculado à este exercício ainda.</p>
    @endif

@endsection
