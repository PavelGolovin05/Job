<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyVacancies extends Model
{
    protected $table = 'my_vacancies';

    public $timestamps = false;

    protected $fillable = [
        'user_id', 'vacancy_id',
    ];
}
