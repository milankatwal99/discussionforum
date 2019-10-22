<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Discussion;

use App\Reply;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;

use App\Http\Requests\DiscussionRequest;

class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('discussion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiscussionRequest $request)
    {
        Discussion::create([
            'user_id'=>Auth::id(),
            'slug'=>Str::slug($request->title),
            'content'=>$request['describe'],
            'title'=>$request['title'],
            'channel_id'=>$request['channel_id'],
        ]);
        return back()->with('success','your post was posted successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function reply($id)
    {
        $reply = Reply::create([
           'user_id'=>Auth::id(),
            'discussion_id'=>$id,
            'content'=>request()->reply
        ]);

        $reply->user->points+=15;
        $reply->user->save();

        return redirect()->back();
    }
}
