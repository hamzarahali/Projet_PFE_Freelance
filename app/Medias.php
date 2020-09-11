<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medias extends Model
{
    //
    protected $fillable = ['produits_id', 'path', 'type'];
    public function produit()
    {
       return $this->belongsTo('App\Produits');
    }
}
