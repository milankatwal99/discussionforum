@extends('layouts.app')

@section('content')
    @foreach($discussions as $discussion)
        <div class = "card mt-3">
            <div class = "card-header"><img class = "rounded-circle" src="{{$discussion->user->image}}" style="width:60px;height:40px;">
                <span> {{ $discussion->user->name}} ({{ $discussion->user->points }})</span>
                <a href = "{{route('forum.show',$discussion->id)}}" class = "btn btn-success float-right">View</a>
            </div>
            <div class = "card-body">
                <h3 class = 'text-center'>{{$discussion->title}}</h3>
                <div class = "card-text">
                    {{--            {{ str_limit($discussion->content,'15') }}--}}
                    <p>{{$discussion->content}}</p>
                </div>

            </div>
            <div class = "card-footer bg-light">
                @if($discussion->replys->count()>0)
                    <p> {{ $discussion->replys->count() }}&nbsp; Reply </p>
                @else
                    <p>NO Reply</p>
                @endif
            </div>
        </div>
    @endforeach



    <div class ="text-center">
    </div>
@endsection
