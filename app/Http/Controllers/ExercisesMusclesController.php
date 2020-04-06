<?php

namespace App\Http\Controllers;

use App\Exercise;
use App\Http\Requests\StoreExerciseMuscle;
use App\Muscle;
use Illuminate\Http\Request;

class ExercisesMusclesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(StoreExerciseMuscle $request, Exercise $exercise)
    {
        $request->validated();

        $muscle = Muscle::findOrFail($request->muscle_id);
        $muscledAdded = $exercise->addMuscle($muscle);

        if ($muscledAdded === false) {
            return redirect("/exercises/{$exercise->id}")
                ->withErrors("O músculo {$muscle->name} já está vinculado ao exercício!");
        }

        $request->session()->flash('success', 'Músculo vinculado ao exercício com sucesso!');

        return redirect("/exercises/{$exercise->id}");
    }

    public function destroy(Request $request, Exercise $exercise, Muscle $muscle)
    {
        $exercise->removeMuscle($muscle);

        $request->session()->flash('success', 'Músculo desvinculado do exercício com sucesso!');

        return redirect("/exercises/{$exercise->id}");
    }
}
