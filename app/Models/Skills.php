<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    protected $primaryKey = 's_id';
    protected $fillable = ['name'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'skills_user', 's_id', 'u_id')
            ->withPivot('level', 'years_of_experience', 'certification')
            ->withTimestamps();
    }

    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'job_skills', 's_id', 'job_id');
    }
}
