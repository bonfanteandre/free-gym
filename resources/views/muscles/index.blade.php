@extends('layout')

@section('title', 'Músculos')

@section('content')

    <h1 class="h3 mb-2 text-gray-800">Músculos</h1>
    <p class="mb-4">Aqui você poderá visualizar todos os músculos cadastrados. Além disso, poderá realizar novos cadastros e editar os existentes.</p>

    <p><a href="/muscles/create" class="btn btn-success"><i class="fa fa-plus"></i> Adicionar</a></p>

    @include('success')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Músculos cadastrados</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th style="width: 15%" class="text-center"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($muscles as $muscle)
                        <tr>
                            <td>{{ $muscle->name }}</td>
                            <td class="text-center">
                                <a href="/muscles/{{ $muscle->id }}" class="btn btn-info"><i class="fas fa-edit"></i> Editar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
