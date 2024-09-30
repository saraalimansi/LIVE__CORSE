<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticationTrait;

class Student extends Model implements Authenticatable
{
    use HasFactory, AuthenticationTrait;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
        'teacher_code',
        'user_id',
        'in_broadcast',
    ];


    public function teacher()
    {
        return $this->belongsToMany(Teacher::class);
    }
    public function subject()
    {
        return $this->belongsToMany(Subject::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
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
