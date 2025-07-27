<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    // protected $table = 'Experience'; // Specify the table name
    protected $primaryKey = 'exe_id'; // Specify the primary key name
    protected $fillable = [
         'xus_id',
         'position',
         'company',
         'discp',
         'start',
         'end',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'xus_id', 'user_id');
    }
}
