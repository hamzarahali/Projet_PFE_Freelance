<?php

namespace App;
use App\Rendezvous;
use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    protected $fillable = ['nom', 'image', 'description', 'benefice', 'image2'];
    public function rendezvous()
    {
        return $this->hasMany('App\Rendezvous');
    }
    public function files()
    {
        return $this->morphMany(Command::Class, 'command_id');
    }
    public function comments()
    {
       return $this->hasMany('App\Comment');
    }
}




