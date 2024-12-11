<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localite extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_loc';

    protected $fillable = [
        'Nomloc',
        'Superficie',
    ];

    public function visiteurs()
    {
        return $this->hasMany(Visiteur::class, 'id_loc', 'id_loc');
    }
}
