<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    protected $fillable = [
        'nom',
    ];

    /**
     * Une classe peut avoir plusieurs enseignants.
     */
    public function enseignants()
    {
        return $this->belongsToMany(Enseignant::class, 'classe_enseignant')
                    ->withTimestamps();
    }
}
