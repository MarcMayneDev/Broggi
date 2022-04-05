<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estats_agencies extends Model
{
    use HasFactory;

    protected $table = 'estats_agencies';

    // Id es la clave primaria default en Eloquent e incrementing es true por defecto.
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false; // updated_at && created_at

    /**
     * Get the user associated with the Estats_agencies
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cartes_trucades_has_agencies()
    {
        return $this->hasOne(Cartes_trucades_has_agencies::class, 'estats_agencies_id');
    }
}
