<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expedients extends Model
{
    use HasFactory;

    protected $table = 'expedients';

    // Id es la clave primaria default en Eloquent e incrementing es true por defecto.
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false; // updated_at && created_at

    /**
     * The roles that belong to the Expedients
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function cartesTrucades(){
        return $this->belongsToMany(Cartes_trucades::class, 'cartes_trucades_id');
    }

    /**
     * Get the user associated with the Expedients
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estats_expedients()
    {
        return $this->hasOne(Estats_expedients::class, 'estats_expedients_id');
    }
}
