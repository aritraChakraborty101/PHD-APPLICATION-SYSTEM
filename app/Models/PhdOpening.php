<?php

// app/Models/PhdOpening.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhdOpening extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'research_area', 'qualifications', 'faculty_id',
    ];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
