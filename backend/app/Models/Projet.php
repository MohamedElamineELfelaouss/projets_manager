<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    protected $table = "projets";

    protected $fillable = ['nomProjet', 'description', 'photoProjet'];

    public function tachs()
    {
        return $this->hasMany(Tache::class, 'idProjet');
    }
}
