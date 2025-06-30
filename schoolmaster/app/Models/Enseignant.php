<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'telephone',
        'sexe',
        'matiere',
    ];

    /**
     * Un enseignant peut enseigner dans plusieurs classes.
     */
    public function classes()
    {
        return $this->belongsToMany(Classe::class, 'classe_enseignant')
                    ->withTimestamps();
    }
}
