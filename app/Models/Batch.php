<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;
    public function course()
    {
        return $this->belongsTo("App\Models\Course");
    }

    public function teachers()
    {
        return $this->belongsToMany("App\Models\Teacher");
    }
}
