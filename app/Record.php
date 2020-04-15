<?php

namespace App;

use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = ['name, expiration', 'user_id', 'client_id'];

    public function instructor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function exercises()
    {
        return $this->hasMany(Exercise::class, 'record_exercise');
    }

    public function addExercise(Exercise $exercise): bool
    {
        if (!$this->containsExercise($exercise)) {
            $this->exercises()->attach($exercise);
            return true;
        }

        return false;
    }

    public function removeExercise(Exercise $exercise): bool
    {
        if ($this->containsExercise($exercise)) {
            $this->exercises()->detach($exercise);
            return true;
        }

        return false;
    }

    public function containsExercise(Exercise $exercise): bool
    {
        return $this->exercises()->get()->contains($exercise);
    }

    public function isExpired()
    {
        $today = Carbon::today();
        $expiration = Carbon::createFromFormat('Y-m-d', $this->expiration);

        return $today->greaterThan($expiration);
    }

    public function getFormattedExpiration()
    {
        return Carbon::createFromFormat('Y-m-d', $this->expiration)->format('d/m/Y');
    }
}
