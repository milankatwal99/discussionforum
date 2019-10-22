<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Channel;
use App\User;
use App\Reply;
use App\Watcher;

class Discussion extends Model
{
    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replys()
    {
        return $this->hasMany(Reply::class);
    }

    public function watchers()
    {
        return $this->hasMany(Watcher::class);
    }

    protected $fillable = ['title','content','user_id','channel_id','slug'];

    public function is_discussion_watch_by_auth_user()
    {
        $id = Auth::id();
        $watchers_ids = array();

        foreach($this->watchers as $w):
            array_push($watchers_ids,$w->user_id);
        endforeach;

        if(in_array($id,$watchers_ids))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function hasBestAnswer()
    {
        $result = false;
        foreach($this->replys as $reply)
        {
            if($reply->best_answer)
            {
                $result = true;
            }
        }
        return $result;
    }
}
