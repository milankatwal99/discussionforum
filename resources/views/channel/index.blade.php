@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Channel
                    </div>

                    <div class="card-body">
                        <table class = "table table-hover">
                            <thead>
                                <tr>
                                    <td>Name</td>
                                    <td>Edit</td>
                                    <td>Delete</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($channels as $channel)
                                    <tr>
                                        <td>{{$channel->name}}</td>
                                        <td><a href = "{{route('channel.edit',$channel->id)}}" class = "btn btn-success">Edit</a></td>
                                        <td>
                                            <form action = "{{route('channel.destroy',$channel->id)}}" method = "post">
                                                @method('delete')
                                                @csrf
                                                <button type = "submit" class = "btn btn-danger ">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
