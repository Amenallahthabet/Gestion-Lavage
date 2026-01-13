<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Realisation extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id', 'vehicle_id', 'employe_id', 'date_debut', 'temps_debut', 'temps_fin'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }
    
}
