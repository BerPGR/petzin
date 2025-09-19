<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $fillable = [
        'name',
        'type',
        'size',
        'image',
        'age',
        'breed',
        'weight',
        'height',
        'notes'
    ];

    public function tutor()
    {
        return $this->belongsTo(User::class);
    }
}
