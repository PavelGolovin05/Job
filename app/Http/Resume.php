<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $table = 'resume';

    public $timestamps = false;

    protected $fillable = [
        'user_id', 'date_birth', 'sex', 'phone', 'city_id', 'education_id', 'university_id', 'specialization', 'year_of_graduation'
    ];
}
