<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendances';

    protected $fillable = [
        'post_id',
        'user_id',
        'full_name',
        'mycard_number',
        'phone_number',
        'adults',
        'kids',
        'created_at',
        'updated_at',
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'attendance_students');
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
