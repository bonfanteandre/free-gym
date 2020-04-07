@extends('layout')

@section('title', 'Clients')

@section('content')

    <h1 class="h3 mb-2 text-gray-800">Clientes</h1>
    <p class="mb-4">Aqui você poderá visualizar todos os clientes cadastrados. Além disso, poderá realizar novos cadastros e editar os existentes.</p>

    <p><a href="/clients/create" class="btn btn-success"><i class="fa fa-plus"></i> Adicionar</a></p>

    @include('success')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Clientes cadastrados</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>E-mail</th>
                        <th>CPF</th>
                        <th style="width: 15%" class="text-center"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($clients as $client)
                        <tr>
                            <td>{{ $client->name }}</td>
                            <td>{{ $client->phone }}</td>
                            <td>{{ $client->email }}</td>
                            <td>{{ $client->document }}</td>
                            <td class="text-center">
                                <a href="/clients/{{ $client->id }}" class="btn btn-info"><i class="fas fa-edit"></i> Editar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
