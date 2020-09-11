<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $fillable = [
       'quantite'
    ];
    public function produit()
    {
       return $this->belongsTo('App\Produits');
    }
    public function user()
    {
       return $this->belongsTo('App\User');
    }
}
