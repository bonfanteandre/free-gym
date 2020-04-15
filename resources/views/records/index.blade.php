@extends('layout')

@section('title', 'Fichas de treino')

@section('content')

    <h1 class="h3 mb-2 text-gray-800">Fichas de treino</h1>
    <p class="mb-4">Aqui você poderá visualizar todos as fichas de treino cadastradas. Além disso, poderá realizar novos cadastros e editar os existentes.</p>

    <p><a href="/records/create" class="btn btn-success"><i class="fa fa-plus"></i> Adicionar</a></p>

    @include('success')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Fichas de treino cadastradas</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Cliente</th>
                        <th>Instrutor</th>
                        <th>Expirado</th>
                        <th style="width: 15%" class="text-center"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($records as $record)
                        <tr>
                            <td>{{ $record->name }}</td>
                            <td>{{ $record->client->name }}</td>
                            <td>{{ $record->instructor->name }}</td>
                            <td>
                                @if($record->isExpired())
                                    <span class="badge badge-danger">Sim</span>
                                @else
                                    <span class="badge badge-success">Não</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="/records/{{ $record->id }}" class="btn btn-info"><i class="fas fa-edit"></i> Editar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection