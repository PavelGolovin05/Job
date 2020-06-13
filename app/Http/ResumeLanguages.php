<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResumeLanguages extends Model
{
    protected $table = 'resume_languages';

    protected $fillable = [
        'resume_id', 'language_id',
    ];
}
