<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'reports';

    /**
     * Property to protect it fillable
     * Set it equal to an array
     * Inside the columns [], is columns that needs to be filled
     */
    protected $fillable = [
        'post_id',
        'title',
        'location',
        'date',
        'time',
        'description',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'post_id' => 'integer',
    ];

    /**
     * Get the user that owns the student.
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
