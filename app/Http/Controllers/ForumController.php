<?php

namespace App\Http\Controllers;

use App\Discussion;
use Illuminate\Http\Request;
use App\Channel;
use App\Reply;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    public function first()
    {
        return view('home');
//
//        switch(request('filter'))comment added
//        {
//            case 'me':
//                dd('filter');
////                $results = Discussion::where('user_id',Auth::id())->paginate(1);
//                break;
//
//
//            default:
//                echo "milan katwal";
//        }
//
////        return view('forum',['discussions'=>$results]);
    }

    public function index()
    {
        $discussions = Discussion::orderBy('created_at','desc')->paginate(2);
        return view('forum')->with('discussions',$discussions);

    }

    public function show($slug)
    {
        $discussion = Discussion::find($slug);
        $best_answer=$discussion->replys()->where('best_answer',1);
          return view('discussion.show')->with('discussion',$discussion)->with('best_answer',$best_answer);
    }

    public function channel($slug)
    {
        $channels = Channel::where('slug',$slug)->first();
        return view('channel')->with('discussions',$channels->discussions);
    }
}
