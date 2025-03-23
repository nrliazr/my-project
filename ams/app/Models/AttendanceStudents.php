<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceStudents extends Model
{
    use HasFactory;

    protected $table = 'attendance_students';

    protected $fillable = [
        'attendance_id',
        'student_id',
        'sname',
    ];

}
