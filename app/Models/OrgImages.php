<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrgImages extends Model
{
    protected $primaryKey = 'imag_id';
    protected $fillable = ['org_id','image'];

    public function organizations()
    {
        return $this->belongsTo(Organization::class,'org_id','org_id');
    }
}
