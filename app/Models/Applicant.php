<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class applicant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'email', 
        'phone', 
        'address', 
        'academic_details',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

