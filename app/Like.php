<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function reply()
    {
        return $this->belongsTo('App\Reply');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    protected $fillable=['user_id','discussion_id','reply_id'];
}
