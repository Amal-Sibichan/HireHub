<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Organization extends Authenticatable
{
    use SoftDeletes, HasFactory, Notifiable;
    protected $primaryKey = 'org_id'; // Specify the primary key name
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'website',
        'logo',
        'city',
        'state',
        'identity',
        'description',
        'password',
        'is_approved',
    ];

    protected $hidden = [
        'password',
    ];

   
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_approved' => 'string',
        ];
    }


    public function Jobs()
    {
        return $this->hasMany(Job::class, 'org_id');
    }
}

