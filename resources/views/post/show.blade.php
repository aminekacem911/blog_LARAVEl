

@extends('layouts.app')
<link rel="stylesheet" href="{{asset('/css/comment.css')}}">
@section('content')
  <main class="main-container">
    <section class="section-container">
      <div class="container-fluid">
        <div class="row">
         <!--   <div class="col-md-2">
                <img src="{{$post->user->image}}" class="img img-rounded img-fluid"/>
                <p class="text-secondary text-center">{{ $post->created_at->diffForHumans() }}</p>
            </div>
            <div class="col-md-10">
                <p>
                 <a class="float-left" ><strong>{{$post->title}}</strong></a>
                </p>
            <div class="clearfix"></div>
               <p>{{$post->desc}}</p>
               <p>
                 @if ($post->user_id !== auth()->id())
                 <a class="float-right btn btn-outline-primary ml-2" href="{{ route('post.show',$post->id)}}"> <i class="fa fa-reply"></i> Reply</a>
                 
                   @else
                   <a class="float-right btn btn-outline-primary ml-2" href="{{ route('post.show',$post->id)}}"> <i class="fa fa-reply"></i> Reply</a>
                <a class="float-right btn btn-outline-primary ml-2 btn btn-info" href="{{route('post.edit',$post->id)}}" ><i class="fa fa-edit"></i>Edit</a>
               <form action="{{route('post.destroy',$post->id)}}" method="post">
                               @csrf
                               @method('DELETE')
                               <button class="float-right btn btn-outline-primary ml-2 btn btn-danger" type="submit"><i class="fa fa-trash"></i> Delete</button>
                             </form>
                     @endif
                  
               </p>
             </div>  !-->
       
        <div class="chatContainer">

         
        <div class="chatHistoryContainer">
          @foreach($post->comments as $comment)
            
            
              <table class="form-comments-table">
                <tr>
                  <td><div class="comment-timestamp">{{ $comment->created_at->diffForHumans() }}</div></td>
                  <td><div class="comment-user"></div></td>
                  <td>
                    <div class="comment-avatar">
                    <img src="{{$comment->user->image}}">
                    </div>
                  </td>
                  <td>
                    
                      <p>{{$comment->comment}}</p>
                                      <div id="commentactions-4 " class="comment-actions">
                                          <div class="btn-group" role="group">
                                            @if ($comment->user_id !== auth()->id())                                         
                                            @else
                                            <a href="{{route('comment.edit',$comment->id)}}" class="btn btn-default btn-sm"><i class="fa fa-pencil"></i>edit</a>
                                                <form action="{{route('comment.destroy',$comment->id)}}" method="post">
                                                  @csrf
                                                  @method('DELETE')
                                                  <button class="btn btn-danger btn-sm" type="submit"><i class="ion-trash-a" ></i>delete</button>
                                                </form>
                                            @endif
                                          </div>                                
                                      </div>
                                 
                  </td>@endforeach
                </tr>
              </table><br><br>
            <form class="form-control" action="{{route ('comment.store')}}" method="post">@csrf
                <div class="input-group input-group-sm chatMessageControls">
                    <input type="text" class="form-control" placeholder="Type your message here.."  name="comment" aria-describedby="sizing-addon3">    
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                     <input type="hidden" name="user_id" value="{{ $post->user_id }}">
                    <span class="input-group-btn">
                        <button id="clearMessageButton" class="btn btn-default" type="button">Clear</button>
                        <button id="sendMessageButton" class="btn btn-primary" type="submit" name="save"><i class="fa fa-send"></i>Send</button>
                    </span>
                    <span class="input-group-btn">
                        <button id="undoSendButton" class="btn btn-default" type="button" disabled><i class="fa fa-undo"></i>Undo</button>
                    </span>
                </div>
            </form>    
        </div>
      </div>    
    </section>
  </main>
@endsection