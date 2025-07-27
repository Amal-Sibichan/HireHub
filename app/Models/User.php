<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'phone',
        'address',
        'resume',
        'city',
        'zip',
        'state',
        'About',
        'Prof',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function skills()
    {
        return $this->belongsToMany(Skills::class, 'skills_user', 'u_id', 's_id')
            ->withPivot('level', 'years_of_experience', 'certification')
            ->withTimestamps();
    }

    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'job_skills', 'u_id', 'job_id')
            ->withPivot('level', 'years_of_experience', 'certification')
            ->withTimestamps();
    }

    public function education()
    {
        return $this->hasMany(Academics::class, 'us_id', 'user_id');
    }

    public function experience()
    {
        return $this->hasMany(Experience::class, 'xus_id', 'user_id');
    }
}
