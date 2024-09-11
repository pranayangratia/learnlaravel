<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Course extends Authenticatable
{
    use HasFactory,Notifiable;

    protected $fillable = ['course_id','course_name','course_details','course_duration','user_id'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
