@extends('layouts.app')

@section('content')
  <main class="main-container">
    <section class="section-container">
      <div class="container-fluid">
         
            <form action="{{route('post.update',$post->id)}}" method="post">
                @method('PATCH') 
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
                <input type="hidden" type="user_id" value="{{Auth::user()->id}}">
                <button type="submit" class="btn btn-primary btn-oval" name="save">Add
            </form>
        
      </div>    
    </section>
  </main>
@endsection