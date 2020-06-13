<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professions extends Model
{
    protected $table = 'professions';

    protected $fillable = [
        'name',
    ];
}
