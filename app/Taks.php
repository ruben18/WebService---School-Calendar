<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taks extends Model
{
    protected $fillable = [
        'name', 'description', 'date', 'complete',
    ];

    protected $hidden = [
        'user_id',
    ];
}
