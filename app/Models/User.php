<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'usuaris';

    // Id es la clave primaria default en Eloquent e incrementing es true por defecto.
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false; // updated_at && created_at

    public function perfils()
    {
        return $this->hasMany(Perfil::class, 'perfils_id');
    }

    public function cartesTrucades(){
        return $this->belongsToMany(Cartes_trucades::class, 'cartes_trucades_id');
    }
}
