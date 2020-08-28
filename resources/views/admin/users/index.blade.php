@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <table style="width:100%">
                    <tr>
                      <th>name:</th>
                      <th>email:</th>
                      <th>role:</th>
                      <th>omeration</th>
                    </tr>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{ implode(',', $user->roles()->get()->pluck('name')->toArray())}}</td>
                        <td> <a class='btn btn-info btn-xs' href="{{ route('admin.users.edit',$user->id)}}" class="glyphicon glyphicon-edit">Edit</a>
                                <form action="{{ route('admin.users.destroy', $user)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="glyphicon glyphicon-remove btn btn-danger btn-xs" type="submit">Delete</button>
                                </form>
                    </tr>   
                    @endforeach     
                  </table>  
            </div>
        </div>
    </div>
</div>
@endsection
