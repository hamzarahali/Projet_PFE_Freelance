<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DemandeFormation extends Model
{
    protected $fillable = ['nom', 'email','telephone', 'formation_id', 'message'];
    public function formation()
    {
       return $this->belongsTo('App\Formations');
    }
}
