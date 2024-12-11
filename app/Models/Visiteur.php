<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visiteur extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_visiteur';

    // Champs remplissables
    protected $fillable = [
        'Nom',
        'Prenom',
        'Naiss',
        'Lieu',
        'Sexe',
        'Diplome',
        'Fonction',
        'Tel',
        'mail',
        'id_loc'
    ];

    // Relation avec Localites
    public function localite()
    {
        return $this->belongsTo(Localite::class, 'id_loc', 'id_loc');
    }
}
