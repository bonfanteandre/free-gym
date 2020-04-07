<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name', 
        'email', 
        'phone', 
        'document', 
        'sex', 
        'birth', 
        'address', 
        'city', 
        'state', 
        'zipcode'
    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function setPhoneAttribute($value)
    {   
        $this->attributes['phone'] = preg_replace('/\D/', '', $value);
    }

    public function setDocumentAttribute($value)
    {
        $this->attributes['document'] = preg_replace('/\D/', '', $value);
    }

    public function setZipcodeAttribute($value)
    {
        $this->attributes['zipcode'] = preg_replace('/\D/', '', $value);
    }

    public function getFormattedBirth(): string
    {
        return Carbon::createFromFormat('Y-m-d', $this->birth)->format('d/m/Y');
    }
}
