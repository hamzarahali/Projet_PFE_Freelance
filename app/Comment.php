<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
       'user_id', 'service_id', 'comment', 'comment_id'
    ]; 

    public function user()
    {
       return $this->belongsTo('App\User');
    }
    public function service()
    {
       return $this->belongsTo('App\service');
    }
    public function comments()
    {
        return $this->hasOne('App\Comment');
    }

    public function commentnext ($id) {
       return Comment::find($id);
    }

}
