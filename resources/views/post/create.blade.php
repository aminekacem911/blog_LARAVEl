@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('post.store',$comment->post_id))}}" method="post">
            @csrf
            <div class="form-group">
                <label class="label-group">title</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="form-group">
                <label class="label-group">Description</label>
                <input type="text" class="form-control" name="desc">
            </div>
        <input type="hidden" type="user_id" value="{{Auth::user()->id}}">
            <button type="submit" name="save">Add
        </form>
    </div>
@endsection