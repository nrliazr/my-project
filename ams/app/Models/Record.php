<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Record extends Model
{
    use HasFactory;

    /**
     * Property to protect it fillable
     * Set it equal to an array
     * Inside the columns [], is columns that needs to be filled
     */
    protected $fillable = [
        'student_id',
        'date',
        'attendance',
        'dropoff_time',
        'sleepwell',
        'takebath',
        'brushteeth',
        'healthcondition',
        'pickup_time',
        'last_updated_at',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public static function isWeekend($date)
{
    $carbonDate = Carbon::parse($date);
    return $carbonDate->dayOfWeek === 0 || $carbonDate->dayOfWeek === 6;
}
}
