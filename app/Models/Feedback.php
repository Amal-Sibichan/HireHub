<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $primaryKey = 'rev_id'; // Specify the primary key name
    protected $fillable = [
         'usr_id',
         'review',
         'rating',
         'og_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'usr_id','user_id');
    }

    public function organizations()
    {
        return $this->belongsTo(Organization::class,'og_id','org_id');
    }
}
