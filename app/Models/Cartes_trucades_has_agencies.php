<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cartes_trucades_has_agencies extends Model
{
    use HasFactory;

    protected $table = 'cartes_trucades_has_agencies';

    // Id es la clave primaria default en Eloquent e incrementing es true por defecto.
    protected $primaryKey = ['cartes_trucades_id', 'agencies_id'];
    public $incrementing = false;
    public $timestamps = false; // updated_at && created_at

    /**
     * Get the user that owns the Cartes_trucades_has_agencies
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cartes_trucades()
    {
        return $this->belongsTo(Cartes_trucades::class, 'cartes_trucades_id');
    }

    public function agencies()
    {
        return $this->belongsTo(Agencies::class, 'agencies_id');
    }
}
