@extends('layouts.app')

    @section('content')
    <div class = "card mt-3">
        <div class = "card-header"><img class = "rounded-circle" src="{{$discussion->user->image}}" style="width:60px;height:40px;">
            <span> {{ $discussion->user->title}} {{$discussion->user->name}} ({{ $discussion->user->points }})</span>
            @if($discussion->is_discussion_watch_by_auth_user())
                <a href = "{{route('discussion.watch',$discussion->id)}}" class = "btn btn-default float-right">Unwatch</a>
            @else
                <a href ="{{route('discussion.unwatch',$discussion->id)}}" class = "btn btn-default float-right">Watch</a>
            @endif

        </div>
        <div class = "card-body">
            <h3 class = 'text-center'>{{$discussion->title}}</h3>
            <div class = "card-text">
{{--                            {{ str_limit($discussion->content,'20]') }}--}}
                @markdown($discussion->content)

            </div>

        </div>
        <div class = "card-footer">
            @if($discussion->replys->count()>0)
                <p> {{ $discussion->replys->count() }}&nbsp;Reply </p>
            @else
                <p>NO Reply</p>
            @endif
        </div>
    </div>

    @foreach($discussion->replys as $reply)
        <div class = "card mt-5">
            <div class = "card-header"><img class = "rounded-circle" src="{{$discussion->user->image}}" style="width:60px;height:40px;">
                <span> {{ $reply->user->name}} ({{$reply->user->points}}) </span>
                @if($best_answer)
                    <a href="{{route('best.answer',$reply->id)}}" class = "btn btn-success float-right" style="color:black;">Marked as Best Answer</a>
                @endif
            </div>
            <div class = "card-body">
                <div class = "card-text">
{{--                                {{ str_limit($discussion->content,'10') }}--}}
                    <p>{{$reply->content}}</p>
                </div>

            </div>
        <div class = "card-footer bg-light">
            @if($reply->is_liked_by_auth_user())
                <a href = "{{route('reply.unlike',$reply->id)}}" class = "btn btn-danger">Unlike&nbsp;{{$reply->likes->count()}}</a>
            @else
                <a href = "{{ route('reply.like',$reply->id) }}" class = "btn btn-success">Like&nbsp; <span class = "badge badge-light">&nbsp;{{$reply->likes->count()}}</span></a>
            @endif
        </div>
        </div>
    @endforeach


    @if(Auth::check())
    <form action = "{{route('discussion.reply',$discussion->id)}}" method = "post">
        @csrf
        <div class = "form-group mt-3">
            <textarea name = "reply" rows="8" class = "form-control" placeholder="Write a Reply"></textarea>
        </div>
        <div class = "form-group">
            <button type = 'submit' class = "btn btn-success">Post</button>
        </div>
    </form>
    @else
        <div class = "text-center">
            <a href = {{route('register')}} style="text-decoration:none;">Sign in to Reply</a>
        </div>


    @endif


@endsection