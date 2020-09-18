@extends('layouts.app')

@section('content')
<main class="main-container">
  <div class="container">
      <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">title</th>
              <th scope="col">description</th>
              <th scope="col">approve</th>
              <th scope="col">edit</th>
              <th scope="col">delete</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              @foreach ($post as $post)          
              <th scope="row">{{$post->id}}</th>
              <td>{{$post->title}}</td>
              <td>{{$post->desc}}</td>
              <td>
                  <form action="{{route('admin.posts.approve')}}" method="post">
                      @method('PUT') 
                  @csrf
                  <input type="hidden" name="id" value="{{$post->id}}">
                  <input type="hidden" name="title" value="{{$post->title}}">
                  <input type="hidden" name="desc" value="{{$post->desc}}">
                  <input type="hidden" name="user_id" value="{{$post->user_id}}">
                  <input type="hidden" name="approve" value="1">
                  <button type="submit" name="save">Approve
                  </form>
              </td>
              <td>
              <a class='btn btn-info btn-xs' href="{{route('admin.posts.edit',$post->id)}}" class="glyphicon glyphicon-edit">Edit</a>
              </td>
              <td>  
              <form action="{{route('admin.posts.destroy',$post->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="glyphicon glyphicon-remove btn btn-danger btn-xs" type="submit">Delete</button>
                  </form>
              </td>
            </tr>
            @endforeach
          </tbody>
      </table>
      <div class="cardbox-heading">
        <div class="cardbox-title"><strong>All Posts</strong></div>
      </div>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">description</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            @foreach ($allposts as $allpost)
            <th scope="row">{{$allpost->id}}</th>
            <td>{{$allpost->title}}</td>
            <td>{{$allpost->desc}}</td>
          </tr>
          @endforeach
        </tbody>
    </table>
  </div>
</main>
@endsection

