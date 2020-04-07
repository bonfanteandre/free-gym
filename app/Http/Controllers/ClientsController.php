<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\StoreClient;
use App\Http\Requests\UpdateClient;
use App\Plan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clients = Client::query()
            ->orderBy('name')
            ->get();

        $success = $request->session()->get('success');

        return view('clients.index', compact('clients', 'success'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plans = Plan::query()
            ->orderBy('name')
            ->get();

        return view('clients.create', compact('plans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClient $request)
    {
        $request->validated();

        $client = new Client;
        $client->name = $request->name;
        $client->document = $request->document;
        $client->phone = $request->phone;
        $client->email = $request->email;
        $client->birth = Carbon::createFromFormat('d/m/Y', $request->birth)->format('Y-m-d');
        $client->sex = $request->sex;
        $client->address = $request->address;
        $client->zipcode = $request->zipcode;
        $client->city = $request->city;
        $client->state = $request->state;
        $client->plan_id = $request->plan_id;
        $client->save();

        $request->session()->flash('success', "Cliente {$client->name} cadastrado com sucesso!");

        return redirect('/clients');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $plans = Plan::query()
            ->orderBy('name')
            ->get();

        return view('clients.edit', compact('client', 'plans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClient $request, Client $client)
    {
        $request->validated();

        $client->name = $request->name;
        $client->document = $request->document;
        $client->phone = $request->phone;
        $client->email = $request->email;
        $client->birth = Carbon::createFromFormat('d/m/Y', $request->birth)->format('Y-m-d');
        $client->sex = $request->sex;
        $client->address = $request->address;
        $client->zipcode = $request->zipcode;
        $client->city = $request->city;
        $client->state = $request->state;
        $client->plan_id = $request->plan_id;
        $client->save();

        $request->session()->flash('success', "Cliente {$client->name} atualizado com sucesso!");

        return redirect('/clients');
    }
}
