<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMuscle;
use App\Muscle;
use Illuminate\Http\Request;

class MusclesController extends Controller
{
    public function index(Request $request)
    {
        $muscles = Muscle::all();

        $success = $request->session()->get('success');

        return view('muscles.index', compact('muscles', 'success'));
    }

    public function create()
    {
        return view ('muscles.create');
    }

    public function store(StoreMuscle $request)
    {
        $request->validated();

        $muscle = new Muscle;
        $muscle->name = $request->name;
        $muscle->save();

        $request->session()->flash('success', 'Músculo adicionado com sucesso!');

        return redirect('/muscles');
    }

    public function edit(Muscle $muscle)
    {
        return view('muscles.edit', compact('muscle'));
    }

    public function update(Muscle $muscle, StoreMuscle $request)
    {
        $request->validated();

        $muscle->name = $request->name;
        $muscle->save();

        $request->session()->flash('success', 'Músculo atualizado com sucesso!');

        return redirect('/muscles');
    }
}
