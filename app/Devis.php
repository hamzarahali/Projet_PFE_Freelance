<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Devis extends Model
{
    protected $fillable = ['nom', 'email','entreprisename', 'telephone', 'message', 'categorie_id','service_id'];
    public function service()
    {
       return $this->belongsTo('App\service');
    }
}
