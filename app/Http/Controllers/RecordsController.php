<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\StoreRecord;
use App\Record;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RecordsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $records = Record::query()
            ->orderBy('id', 'desc')
            ->get();

        $success = $request->session()->get('success');

        return view('records.index', compact('records', 'success'));
;    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::query()
            ->orderBy('name')
            ->get();

        $instructor = auth()->user();

        return view('records.create', compact('clients', 'instructor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecord $request)
    {
        $request->validated();

        $record = new Record;
        $record->name = $request->name;
        $record->expiration = Carbon::createFromFormat('d/m/Y', $request->expiration)->format('Y-m-d');
        $record->client_id = $request->client_id;
        $record->user_id = auth()->user()->id;
        $record->save();

        $request->session()->flash('success', "Ficha {$record->name} cadastrada com sucesso!");

        return redirect('/records');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function edit(Record $record)
    {
        $clients = Client::query()
            ->orderBy('name')
            ->get();

        $instructor = auth()->user();

        return view('records.edit', compact('record', 'clients', 'instructor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRecord $request, Record $record)
    {
        $request->validated();

        $record->name = $request->name;
        $record->expiration = Carbon::createFromFormat('d/m/Y', $request->expiration)->format('Y-m-d');
        $record->client_id = $request->client_id;
        $record->user_id = auth()->user()->id;
        $record->save();

        $request->session()->flash('success', "Ficha {$record->name} cadastrada com sucesso!");

        return redirect('/records');
    }
}
