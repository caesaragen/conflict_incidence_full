<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConflictIncident extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'conservation_area',
        'station',
        'outpost',
        'reporting_date_from',
        'reporting_date_to',
        'incident_type',
        'affected',
        'area',
        'location',
        'animal_responsible',
        'action_taken',
        'kws_ob_number',
        'x_coordinate',
        'y_coordinate',
        'serial_number',
    ];
    

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

    public function incidentType()
    {
        return $this->belongsTo(IncidentType::class, 'incident_type');
    }
}
