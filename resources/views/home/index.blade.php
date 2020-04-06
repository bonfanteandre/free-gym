@extends('layout')

@section('title', 'Home')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bem-vindo ao Free Gym, {{ auth()->user()->name }}!</h6>
        </div>
        <div class="card-body">
            <p>Através desse painel você poderá gerenciar sua academia.</p>
        </div>
    </div>
@endsection
