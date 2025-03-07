<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'name',
        'text',
        'image'
    ];

    public function scopeStartsWithA($query)
    {
        return $query->where('name', 'like', 'A%');
    }
}
