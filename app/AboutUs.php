<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $fillable = [
        'title',
        'image',
    ];

    public function scopeStartsWithA($query)
    {
        return $query->where('name', 'like', 'A%');
    }
}
