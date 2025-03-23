<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
        'user_id',
        'sname',
        'mykid_number',
        'sbirth_date',
        'age',
        'gender',
        'class_of',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
    ];

    /**
     * Get the user that owns the student.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function attendances()
    {
        return $this->belongsToMany(Attendance::class, 'attendance_students');
    }

    public function records()
    {
        return $this->belongsToMany(Record::class);
    }

    public function setYearAttribute($value)
    {
        $this->attributes['class_of'] = $value;
    }

    public function fees()
    {
        return $this->hasMany(Fee::class);
    }

    public function hasPaidPreviousMonthFee()
    {
        $previousMonth = now()->subMonth();
        return $this->fees()->whereMonth('created_at', $previousMonth->month)->whereYear('created_at', $previousMonth->year)->exists();
    }

    public function hasUpdatedToday()
    {
        $today = now()->format('Y-m-d');
        return Record::where('student_id', $this->id)->whereDate('created_at', $today)->exists();
    }

    public function getAttendancePercentageAttribute()
    {
        $records = Record::where('student_id', $this->id)->get();
        $totalSchoolDays = $records->count();
        $presentDays = $records->filter(function ($record) {
            return $record->attendance === 'Attend';
        })->count();

        if ($totalSchoolDays > 0) {
            return number_format(($presentDays / $totalSchoolDays) * 100, 2);
        } else {
            return 0;
        }
    }
}
