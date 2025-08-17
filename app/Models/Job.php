<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Job extends Model
{
   /** @use HasFactory<\Database\Factories\UserFactory> */
   use HasFactory, Notifiable;

   /**
    * The attributes that are mass assignable.
    *
    * @var list<string>
    */
   protected $primaryKey = 'j_id';
   protected $fillable = [
       'name',
       'org_id',
       'description',
       'skills',
       'Experience',
       'Education',
       'address',
       'city',
       'salary',
       'state',
       'due',
   ];





    public function Skills()
    {
        return $this->belongsToMany(Skills::class, 'job_skills', 'job_id', 'skill_id');
    }


    public function organization()
    {
        return $this->belongsTo(Organization::class, 'org_id');
    }
}
