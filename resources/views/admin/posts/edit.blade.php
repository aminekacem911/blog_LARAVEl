@extends('layouts.app')

@section('content')
<main class="main-container">
    <div class="container">
        <form action="{{route('admin.posts.update',$post->id)}}" method="post">
            @method('PUT') 
            @csrf
            <div class="form-group">
                <label class="label-group" for="category">Choose a Category:</label>   
                <select class="form-control" name="cat_id">
                    @foreach ($namecat as $item)
                    @if($post->cat_id == $item->id)
                    @php 
                        $selected = "selected";
                    @endphp
                    @else
                    @php 
                        $selected = "";
                    @endphp
                    @endif
                        <option value="{{$item->id}}" {{$selected}}>{{$item->category}} </option>
                    @endforeach
                </select>
            <div class="form-group">
                <label class="label-group">title</label>
                <input type="text" class="form-control" name="title" value="{{$post->title}}">
            </div>
            <div class="form-group">
                <label class="label-group">Description</label>
                <input type="text" class="form-control" name="desc" value="{{$post->desc}}">
            </div>
                <input type="hidden" name="user_id" value="{{$post->user_id}}">
                <input type="hidden" name="approve" value="1">
            <button class="btn btn-primary btn-oval" type="submit" name="save">Add</button>
        </form>
    </div>
</main>
@endsection