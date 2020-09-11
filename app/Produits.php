<?php

namespace App;

use App\Categories;
use Illuminate\Database\Eloquent\Model;

class Produits extends Model
{
    protected $fillable = ['nom', 'image','categorie_id', 'description', 'marque', 'quantite', 'prix'];
    public function categorie()
    {
       return $this->belongsTo('App\Categories');
    }
    public function files()
    {
        return $this->morphMany(Command::Class, 'command_id');
    }
    public function cmdProduit()
    {
       return $this->hasMany('App\CommandProduit');
    }
    public function cart()
    {
       return $this->hasMany('App\Cart');
    }
    public function medias()
    {
       return $this->hasMany('App\Medias');
    }
}
