@extends('layouts.app')

@section('content')
    <div class="container">
        <table style="width:100%">
            <tr>
              <th>ID</th>
              <th>TITLE</th>
              <th>DESCRIPTION</th>
              <th>OPERATION</th>
            </tr>
           
            <tr>
              <td> {{$post->id}}</td>
              <td> {{$post->title}}</td>
              <td> {{$post->desc}}</td>
             
            </tr>
           
           
            
          </table>
          <div class="comment-list">
            @foreach($post->comments as $comment)
                <ul class="comment-list">
                <div class="comment-grid">
                   
                    <div class="comment-info">
                        <h4>{{ $comment->user->name }}</h4>
                        <p>{{ $comment->comment }}</p> 
                        <h5>{{ $comment->created_at->diffForHumans() }}</h5>
                        <p><strong>{{$comment->user_id}}</strong></p>
                    
                        @if ($comment->user_id !== auth()->id())
                            
                        @else

                    <td> <a class='btn btn-info btn-xs' href="{{route('comment.edit',$comment->id)}}" class="glyphicon glyphicon-edit">Edit</a>
                                <form action="{{route('comment.destroy',$comment->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="glyphicon glyphicon-remove btn btn-danger btn-xs" type="submit">Delete</button>
                                  </form>
                          @endif
                        
                    </div>
                    <div class="clearfix"></div>
                </div>
            </ul>
            @endforeach
            </div>
                <form action="{{route ('comment.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">comments</label>
                        <input class="form-control" type="text" name="comment">
                    </div>
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        <input type="hidden" name="user_id" value="{{ $post->user_id }}">
                        <button class="btn btn-info" type="submit" name="save">add comments
                </form> 
            </div>
@endsection

