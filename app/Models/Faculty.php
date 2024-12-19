<?php

// app/Models/Faculty.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'department', 'research_interests', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

