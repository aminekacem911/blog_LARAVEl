@extends('layouts.app')

@section('content')
  <main class="main-container">
    <section class="section-container">
      <div class="container-fluid">
        <div class="row">
          <button class="mr-8 mb-6 btn btn-primary btn-gradient" style ="margin-left: 85%;" type="button" data-toggle="modal" data-target=".demo-modal-std">New Post</button>
            <div class="modal fade demo-modal-std">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="mt-0 modal-title">Create Post</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span>&times;</span></button>
                  </div>
                  <div class="modal-body">
                    <form action="{{route('post.store')}}" method="post">
                      @csrf
                      <div class="form-group">
                          <label for="category">Choose a Category:</label>
                          <select class="form-control" name="cat_id" >
                              <option value="1">job</option>
                              <option value="2">meeting</option>
                              <option value="3">collocation</option>
                              <option value="4">trade</option>
                              <option value="5">gaming</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label class="label-group">title</label>
                          <input type="text" class="form-control" name="title">
                      </div>
                      <div class="form-group">
                          <label class="label-group">Description</label>
                          <input type="text" class="form-control" name="desc">
                      </div>
                      <div class="form-group">
                          <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                          <input type="hidden" name="approve" value="0">
                      </div>
                      <button class="btn btn-primary btn-oval" type="submit" name="save">Add
                  </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="row">    
              @foreach ($post as $p)       
                <div class="col-md-2">
                  <img src="{{$p->user->image}}" class="img img-rounded img-fluid"/>
                  <p class="text-secondary text-center">{{ $p->created_at->diffForHumans() }}</p>
                </div>
              <div class="col-md-10">
                  <p>
                      <a class="float-left" ><strong>{{$p->title}}</strong></a>
                 </p>
                 <div class="clearfix"></div>
                    <p>{{$p->desc}}</p>
                    <p>
                      @if ($p->user_id !== auth()->id())
                      <a class="float-right btn btn-outline-primary ml-2" href="{{ route('post.show',$p->id)}}"> <i class="fa fa-reply"></i> Reply</a>
                      
                        @else
                        <a class="float-right btn btn-outline-primary ml-2" href="{{ route('post.show',$p->id)}}"> <i class="fa fa-reply"></i> Reply</a>
                     <a class="float-right btn btn-outline-primary ml-2 btn btn-info" href="{{route('post.edit',$p->id)}}" ><i class="fa fa-edit"></i>Edit</a>
                    <form action="{{route('post.destroy',$p->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="float-right btn btn-outline-primary ml-2 btn btn-danger" type="submit"><i class="fa fa-trash"></i> Delete</button>
                                  </form>
                          @endif
                       
                    </p>
                  </div>
                @endforeach{!! $post->links() !!}
        </div>
      </div>    
    </section>
  </main>
@endsection