<?php

namespace App\Http\Controllers;

use App\Exercise;
use App\Http\Requests\StoreExerciseMuscle;
use App\Muscle;
use Illuminate\Http\Request;

class ExercisesMusclesController extends Controller
{
    public function store(StoreExerciseMuscle $request, Exercise $exercise)
    {
        $request->validated();

        $muscle = Muscle::findOrFail($request->muscle_id);
        $exercise->addMuscle($muscle);

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
