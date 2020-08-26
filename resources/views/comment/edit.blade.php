@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('comment.update',$comment->id)}}" method="post">
            @method('PATCH') 
        @csrf
           
            <div class="form-group">
                <label class="label-group">comment</label>
                <input type="text" class="form-control" name="comment" value="{{$comment->comment}}">
            </div>
            <input type="hidden" type="post_id" value="{{$comment->post_id}}">
            <input type="hidden" type="user_id" value="{{Auth::user()->id}}">
            <button type="submit" name="save">Add
        </form>
    </div>
@endsection