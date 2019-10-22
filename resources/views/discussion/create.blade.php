@extends('layouts.app')
@section('content')
   <div class = "container mt-2">
       <form action = "{{route('discussion.store')}}" method = "post">
           @csrf
                   <div class = "form-group">
                       <label for = "title">Title</label>
                           <input type = "text" class = "form-control" id = "title" name = "title">
                   </div>
               <div class = "form-group">
               <label for = "language">Pick Channel</label>
               <select name = "channel_id" class = "form-control" id = "language">
                   @foreach($channels as $channel)
                       <option value = {{$channel->id}}>{{$channel->name}}</option>
                    @endforeach
               </select>
               </div>

               <div class = "form-group mt-2">
                   <label for = "describe">Ask Question</label>
                   <textarea class = "form-control" name = "describe" rows="8" id = "describe"></textarea>
               </div>
               <div class = "form-group">
                   <button type = "submit" class = 'btn btn-success'>Ask</button>
               </div>
           </div>
       </form>
   </div>
@endsection