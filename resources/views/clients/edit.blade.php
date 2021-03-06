@extends('layout')

@section('title', 'Clientes')

@section('content')

    <h1 class="h3 mb-2 text-gray-800">Cadastro de cliente</h1>
    <p class="mb-4">Preencha o formulário para atualizar o cliente.</p>
    <p><small>Campos marcados com * são obrigatórios.</small></p>

    @include('errors')

    <form method="POST" action="/clients/{{ $client->id }}">
        @method('PATCH')
        @csrf

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="name"><strong>Nome *</strong></label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="João Da Silva" value="{{ $client->name }}">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="document"><strong>CPF *</strong></label>
                    <input type="text" name="document" class="form-control" id="document" placeholder="000.000.000-00" value="{{ $client->document  }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="phone"><strong>Telefone *</strong></label>
                    <input type="text" name="phone" class="form-control" id="phone" placeholder="(00) 00000-0000" value="{{ $client->phone }}">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="email"><strong>E-mail *</strong></label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="joao@email.com.br" value="{{ $client->email }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="birth"><strong>Data de nascimento *</strong></label>
                    <input type="text" name="birth" class="form-control" id="birth" placeholder="00/00/0000" value="{{ $client->getFormattedBirth() }}">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="sex"><strong>Sexo *</strong></label>
                    <select name="sex" id="sex" class="form-control">
                        <option value="" selected disabled>Selecione o sexo</option>
                        <option value="F" @if($client->sex === 'F') selected @endif>Feminino</option>
                        <option value="M" @if($client->sex === 'M') selected @endif>Masculino</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="address"><strong>Endereço *</strong></label>
                    <input type="text" name="address" class="form-control" id="address" placeholder="Avenida Paulista, 123" value="{{ $client->address }}">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="zipcode"><strong>CEP *</strong></label>
                    <input type="text" name="zipcode" class="form-control" id="zipcode" placeholder="00000-000" value="{{ $client->zipcode }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="city"><strong>Cidade *</strong></label>
                    <input type="text" name="city" class="form-control" id="city" placeholder="São Paulo" value="{{ $client->city }}">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="state"><strong>Estado *</strong></label>
                    <input type="text" name="state" class="form-control" id="state" placeholder="SP" value="{{ $client->state }}">
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="plan"><strong>Plano *</strong></label>
                    <select name="plan_id" id="plan" class="form-control">
                        <option value="" selected disabled>Selecione um plano</option>
                        @foreach($plans as $plan)
                            <option value="{{ $plan->id }}" @if($plan->id === $client->plan->id) selected @endif>{{ $plan->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Salvar</button>

    </form>

@endsection
