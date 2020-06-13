<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResumeExperience extends Model
{
    protected $table = 'resume_experience';

    protected $fillable = [
        'resume_id', 'company_name', 'start_work', 'end_word', 'position'
    ];
}
