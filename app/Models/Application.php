<?php
// app/Models/Application.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'phd_opening_id', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function phdOpening()
    {
        return $this->belongsTo(PhdOpening::class);
    }
}
