<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function Skills()
    {
        return $this->belongsToMany(Skills::class, 'job_skills', 'job_id', 'skill_id');
    }
}
