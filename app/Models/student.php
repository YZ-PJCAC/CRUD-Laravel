<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($student) {
            $lastStudent = student::latest()->first();
            $number = $lastStudent ? (intval(substr($lastStudent->id, -4)) + 1) : 1;
            $student->student_code = 'STU' . str_pad($number, 4, '0', STR_PAD_LEFT);
        });
    }
    protected $fillable = ['name', 'student_code', 'phone', 'email', 'dob','Major', 'gender'];

    public function course()
{
    return $this->belongsTo(Course::class);
}

    public function exam_marks()
{
    return $this->hasMany(examination::class);
}

}


