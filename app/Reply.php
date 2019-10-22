<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Discussion;

use App\User;

use Illuminate\Support\Facades\Auth;

class Reply extends Model
{
    public function discussion()
    {
        return $this->belongsTo('Discussion::class');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function is_liked_by_auth_user()
    {
        $id = Auth::id();
        $likers = array();

        foreach($this->likes as $like) {
            array_push($likers, $like->user_id);
        }
        if(in_array($id,$likers))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    protected $fillable = ['user_id','discussion_id','content'];
}
