<?php

namespace App\Http\Controllers;

use App\Muscle;
use Illuminate\Http\Request;

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

    public function store()
    {
        $this->validateMuscle();

        $muscle = Muscle::create(request()->only(['name']));

        return redirect('/muscles');
    }

    public function edit(Muscle $muscle)
    {
        return view('muscles.edit', compact('muscle'));
    }

    private function validateMuscle()
    {
        return request()->validate([
            'name' => ['required']
        ]);
    }
}
