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
            @foreach ($post as $p)
            <tr>
              <td> {{$p->id}}</td>
              <td> {{$p->title}}</td>
              <td> {{$p->desc}}</td>
              
              <td> <a class='btn btn-info btn-xs' href="{{ route('post.edit',$p->id)}}" class="glyphicon glyphicon-edit">Edit</a>
                <form action="{{ route('post.destroy', $p->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="glyphicon glyphicon-remove btn btn-danger btn-xs" type="submit">Delete</button>
                  </form>
                  <a class='btn btn-success btn-xs' href="{{ route('post.show',$p->id)}}" class="glyphicon glyphicon-edit">comments</a>
                 
                </td>
            </tr>
            @endforeach
          </table>
    </div>
@endsection

