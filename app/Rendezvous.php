<?php

namespace App;
use App\User;
use App\service;
use Illuminate\Database\Eloquent\Model;

class Rendezvous extends Model
{
    protected $fillable = ['date', 'heure','user_id', 'service_id', "adresse"];
    public function user()
    {
       return $this->belongsTo('App\User');
    }
    public function service()
    {
        return $this->belongsTo('App\service');
    }
}
