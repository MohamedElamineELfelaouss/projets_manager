<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Developpeur extends Model
{
    protected $table = "developpeurs";

    protected $fillable = ["nomDev", "prenomDev", "cvDev", "photoDev"];

    public function taches()
    {
        return $this->hasMany(Tache::class, 'idDev');
    }
}
