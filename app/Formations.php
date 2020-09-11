<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formations extends Model
{
    protected $fillable = ['nom', 'image','description'];
    public function demandeformations()
    {
       return $this->hasMany('App\DemandeFormation');
    }
}
