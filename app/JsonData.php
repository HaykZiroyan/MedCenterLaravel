<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JsonData extends Model
{ 
    protected $fillable = [
        'name',
        'email',
        'phone',
    ];

    public function scopeStartsWithA($query)
    {
        return $query->where('name', 'like', 'A%');
    }
}
