<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory,Notifiable;

    protected $fillable = ['name','email', 'password','role'];

    public function hasRole($roleName)
    {
        return $this->role->contains('email', $roleName); 
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
