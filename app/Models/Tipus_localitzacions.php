<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipus_localitzacions extends Model
{
    use HasFactory;

    protected $table = 'tipus_localitzacions';

    // Id es la clave primaria default en Eloquent e incrementing es true por defecto.
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false; // updated_at && created_at

    /**
     * The roles that belong to the Tipus_localitzacions
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function CartesTrucades()
    {
        return $this->belongsToMany(Cartes_trucades::class, 'cartes_trucades_id');
    }
}
