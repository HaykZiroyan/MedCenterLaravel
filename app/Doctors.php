<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
    protected $fillable = [
        'name',
        'profession',
        'service',
    ];

    public function scopeStartsWithA($query)
    {
        return $query->where('name', 'like', 'A%');
    }
}
