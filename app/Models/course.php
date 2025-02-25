<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    protected $fillable = ['course_name', 'course_code', 'credit_hour', 'description' ];

    public function exam_marks()
    {
        return $this->hasMany(examination::class);
    }
}

