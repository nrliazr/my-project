<?php

namespace App\Models;

// use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // use Sluggable;

    /**
     * Property to protect it fillable
     * Set it equal to an array
     * Inside the columns [], is columns that needs to be filled
     */
    protected $fillable = [
        'title',
        'location',
        'date',
        'time',
        'description',
        'image_path',
        'created_at',
        'updated_at',
    ];

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function getAttendanceSummary()
    {
        $adults = 0;
        $kids = 0;
        foreach ($this->attendances as $attendance) {
            $adults += 1; // count the parent/guardian as 1 adult
            $kids += $attendance->students()->count(); // count each student as a kid
            $adults += $attendance->adults; // add the number of adults
            $kids += $attendance->kids; // add the number of kids
        }

        return "$adults Adults, $kids Kids";
    }
}
