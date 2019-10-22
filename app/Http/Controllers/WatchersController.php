<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Watcher;
use Illuminate\Support\Facades\Auth;


class WatchersController extends Controller
{
    public function watch($id)
    {
        Watcher::create([
            'discussion_id'=>$id,
            'user_id'=>Auth::id()
        ]);
        return back()->with('success','You are watching');
    }

    public function unwatch($id)
    {
        $watcher = Watcher::where('discussion_id',$id)->where('user_id',Auth::id());
       $watcher->delete();
        return redirect()->back()->with('success', 'you are no longer watching this');
    }
}
