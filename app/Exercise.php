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

    public function addMuscle(Muscle $muscle): bool
    {
        if (!$this->containsMuscle($muscle)) {
            $this->muscles()->attach($muscle);
            return true;
        }

        return false;
    }

    public function removeMuscle(Muscle $muscle): bool
    {
        if ($this->containsMuscle($muscle)) {
            $this->muscles()->detach($muscle);
            return true;
        }

        return false;
    }

    public function containsMuscle(Muscle $muscle): bool
    {
        return $this->muscles()->get()->contains($muscle);
    }
}
