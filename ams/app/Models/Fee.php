<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'month',
        'year',
        'total_amount',
        'status',
        'paid_amount',
        'payment_date',
        'payment_method',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
