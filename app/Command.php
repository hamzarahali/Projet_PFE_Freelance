<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    //

    protected $fillable = [
       'user_id', 'prix_total', 'adresse', 'created_at'
    ];
    public function user()
    {
       return $this->belongsTo('App\User');
    }
    
    public function cmdProduit()
    {
       return $this->hasMany('App\CmdProduits');
    }
}
