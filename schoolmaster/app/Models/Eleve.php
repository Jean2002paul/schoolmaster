<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    protected $fillable = [
        'nom',
        'prenom',
        'sexe',        
        'classe_id',
        'email',
        'telephone',
    ];

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }
}
