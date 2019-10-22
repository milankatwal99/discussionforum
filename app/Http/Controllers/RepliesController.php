<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Like;

use App\Reply;

use Illuminate\Support\Facades\Auth;

class RepliesController extends Controller
{
    public function like($id)
    {
        Like::create([
            'reply_id' => $id,
            'user_id' => Auth::id()

        ]);
        return redirect()->back();
    }

    public function unlike($id)
    {
        $like = Like::where('reply_id', $id);
        $like->delete();
        return redirect()->back();
    }

    public function bestAnswer($id)
    {
        $reply = Reply::find($id);
        $reply->best_answer=1;
        $reply->save();
        return redirect()->back()->with('success','Marked as best answer');

    }

}
