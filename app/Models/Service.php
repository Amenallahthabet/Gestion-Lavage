<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['nom','tempservice','prixservice'];


    public function realisation()
    {
        return $this->hasMany(Realisation::class);
    }
}
