<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmdProduits extends Model
{
    //

    protected $fillable = [
      'produit_id', 'quantite', 'command_id'
   ];

    public function produit()
    {
       return $this->belongsTo('App\Produits');
    }
    public function command()
    {
       return $this->belongsTo('App\Produits');
    }
}
