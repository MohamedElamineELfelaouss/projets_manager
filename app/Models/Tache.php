<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    protected $table = "taches";

    protected $fillable =
        [
            'nomTache',
            'idProjet',
            'idDev',
            'duree',
            'coutHeure',
            'etat',
        ];

    public function projets()
    {
        return $this->belongsTo(Projet::class, 'idProjet');
    }

    public function developpeurs()
    {
        return $this->belongsTo(Developpeur::class, 'idDev');
    }

}
