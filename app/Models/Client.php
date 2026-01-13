<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    
    protected $fillable = ['nom', 'prenom', 'telephone'];

   
    public $timestamps = true;
    protected $table='clients';

    
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
