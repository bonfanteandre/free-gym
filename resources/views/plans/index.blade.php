@extends('layout')

@section('title', 'Planos')

@section('content')

    <h1 class="h3 mb-2 text-gray-800">Planos</h1>
    <p class="mb-4">Aqui você poderá visualizar todos os planos cadastrados. Além disso, poderá realizar novos cadastros e editar os existentes.</p>

    <p><a href="/plans/create" class="btn btn-success"><i class="fa fa-plus"></i> Adicionar</a></p>

    @include('success')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Planos cadastrados</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th style="width: 15%" class="text-center">Preço (R$)</th>
                        <th style="width: 15%" class="text-center"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($plans as $plan)
                        <tr>
                            <td>{{ $plan->name }}</td>
                            <td class="text-center">{{ $plan->price }}</td>
                            <td class="text-center">
                                <a href="/plans/{{ $plan->id }}" class="btn btn-info"><i class="fas fa-edit"></i> Editar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
