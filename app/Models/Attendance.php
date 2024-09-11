<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Course;
use Illuminate\Notifications\Notifiable;

class Attendance extends Model
{
    use HasFactory,Notifiable;

    protected $fillable = ['course_id', 'user_id', 'date'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
