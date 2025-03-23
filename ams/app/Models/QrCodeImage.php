<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrCodeImage extends Model
{

    protected $table = 'teacher_qr_codes';

    use HasFactory;

    protected $fillable = [
        'user_id',
        'qr_code_image',
    ];

}
