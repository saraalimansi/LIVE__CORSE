<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
        'subject',
        'photos',
        'code',
        'user_id',
        'broadcast_started',

    ];



    public function student()
    {
        return $this->belongsToMany(Student::class);
    }
    public function subject()
    {
        return $this->hasOne(Subject::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function assignment()
    {
        return $this->hasMany(Assignment::class);
    }


}
