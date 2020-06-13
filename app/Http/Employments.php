<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employments extends Model
{
    protected $table = 'employments';

    protected $fillable = [
        'name',
    ];
}
