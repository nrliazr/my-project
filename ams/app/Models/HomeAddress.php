<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeAddress extends Model
{
    use HasFactory;

    protected $table = 'home_addresses';

    protected $fillable = [
        'user_id',
        'address_line1',
        'address_line2',
        'post_code',
        'district',
        'state',
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
     * Get the user that owns the home address.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
