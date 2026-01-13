<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    protected $fillable = ['nom', 'prenom', 'telephone'];

   
    public $timestamps = true;

    public function realisation()
    {
        return $this->hasMany(Realisation::class);
    }
}
