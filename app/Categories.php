<?php

namespace App;

use App\Produits;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = ['nom'];

    /*public function setNameAttribute($nom)
    {
       $this->attributes['nom'] = $nom;
    }*/

    public function produits()
    {
       return $this->hasMany('App\Produits');
    }
    public function devis()
    {
       return $this->hasMany('App\Devis');
    }
}
