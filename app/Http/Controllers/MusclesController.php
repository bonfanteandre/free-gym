<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMuscle;
use App\Muscle;

class MusclesController extends Controller
{
    public function index()
    {
        $muscles = Muscle::all();

        return view('muscles.index', compact('muscles'));
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

        return redirect('/muscles');
    }
}
