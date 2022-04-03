<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;
    protected $table = 'perfils';

    // Id es la clave primaria default en Eloquent e incrementing es true por defecto.
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false; // updated_at && created_at

    /**
     * Get all of the usuaris for the Perfil
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usuaris()
    {
        return $this->belongsTo(User::class, 'perfils_id');
    }
}
