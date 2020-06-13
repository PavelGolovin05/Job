<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancies extends Model
{
    protected $table = 'vacancies';

    public $timestamps = false;

    protected $fillable = [
        'name', 'user_id', 'schedule_id', 'employment_id', 'experience', 'profession_id', 'city_id', 'requirements', 'description', 'publication_date', 'salary', 'phone',
    ];
}
