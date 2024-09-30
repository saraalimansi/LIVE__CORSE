<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'teacher_code','teacher_name','photos','teacher_id'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function student()
    {
        return $this->belongsToMany(Student::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function assignment()
    {
        return $this->hasMany(Assignment::class);
    }

    public function studentfiles()
    {
        return $this->hasMany(StudentFiles::class);
    }

    public function studentassignment()
    {
        return $this->hasMany(StudentAssignment::class);
    }




}
