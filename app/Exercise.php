<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = ['name', 'description'];

    public function muscles()
    {
        return $this->belongsToMany(Muscle::class, 'exercise_muscle');
    }

    public function addMuscle(Muscle $muscle)
    {
        if (!$this->containsMuscle($muscle)) {
            $this->muscles()->attach($muscle);
        }
    }

    public function removeMuscle(Muscle $muscle)
    {
        if ($this->containsMuscle($muscle)) {
            $this->muscles()->detach($muscle);
        }     
    }

    public function containsMuscle(Muscle $muscle)
    {
        return $this->muscles()->get()->contains($muscle);
    }
}
