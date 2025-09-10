<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $primaryKey = 'app_id'; // Specify the primary key name
    protected $fillable = [
         'u_id',
         'job_id',
         'or_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'u_id', 'user_id');
    }

    public function jobs()
    {
        return $this->belongsTo(Job::class, 'job_id', 'j_id');
    }

    
}
