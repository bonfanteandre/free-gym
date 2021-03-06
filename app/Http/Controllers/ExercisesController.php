<?php

namespace App\Http\Controllers;

use App\Exercise;
use App\Http\Requests\StoreExercise;
use App\Muscle;
use Illuminate\Http\Request;

class ExercisesController extends Controller
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
        $exercises = Exercise::query()->get();

        $success = $request->session()->get('success');

        return view('exercises.index', compact('exercises', 'success'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('exercises.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExercise $request)
    {
        $request->validated();

        $exercise = new Exercise;
        $exercise->name = $request->name;
        $exercise->description = $request->description;
        $exercise->save();

        $request->session()->flash('success', 'Exercício cadastrado com sucesso!');

        return redirect("/exercises/{$exercise->id}");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Exercise $exercise)
    {
        $muscles = Muscle::query()
            ->orderBy('name', 'ASC')
            ->get();

        $success = $request->session()->get('success');

        return view('exercises.edit', compact('exercise', 'muscles', 'success'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function update(StoreExercise $request, Exercise $exercise)
    {
        $request->validated();

        $exercise->name = $request->name;
        $exercise->description = $request->description;
        $exercise->save();

        $request->session()->flash('success', 'Exercício atualizado com sucesso!');

        return redirect('/exercises');
    }
}
