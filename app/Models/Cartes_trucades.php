<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cartes_trucades extends Model
{
    use HasFactory;

    protected $table = 'cartes_trucades';

    // Id es la clave primaria default en Eloquent e incrementing es true por defecto.
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false; // updated_at && created_at

    public function user()
    {
        return $this->hasOne(User::class, 'user_id');
    }

    public function tipusLocalitzacions()
    {
        return $this->hasOne(Tipus_localitzacions::class, 'tipus_localitzacions_id');
    }

    public function dadesPersonals()
    {
        return $this->hasOne(Dades_personals::class, 'dades_personals_id');
    }
}
