@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('post.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label class="label-group">title</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="form-group">
                <label class="label-group">Description</label>
                <input type="text" class="form-control" name="desc">
            </div>
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        <input type="hidden" name="approve" value="0">
        
        <label for="category">Choose a Category:</label>
            <select class="form-group" name="cat_id" >
              <option value="1">job</option>
              <option value="2">meeting</option>
              <option value="3">collocation</option>
              <option value="4">trade</option>
              <option value="5">gaming</option>
            </select>
        
            <button type="submit" name="save">Add
        </form>
    </div>
@endsection