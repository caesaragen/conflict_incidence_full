<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConflictIncident extends Model
{
    use HasFactory;
    
    protected $guarded = [];

        /**
         * Relationship with the user who created the report
         */ 
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
        /**
         * Relationship with the area warden who verified the report 
         */ 
    public function areaWarden()
    {
        return $this->belongsTo(User::class, 'verified_by');
    }
}
