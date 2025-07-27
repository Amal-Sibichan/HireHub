<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Academics extends Model
{
    protected $primaryKey = 'edu_id'; // Specify the primary key name
    protected $fillable = [
       'us_id',
       'Level',
       'institute',
       'Course',
       'start',
       'end',      
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'us_id', 'user_id');
    }
}
