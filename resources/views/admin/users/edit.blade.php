@extends('layouts.app')

@section('content')
<main class="main-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
            <div class="card-header">Edit User ::::::<b>{{$user->name}}</b></div>
                    <div class="card">
                        <form action="{{route('admin.users.update',$user)}}" method="post">
                            @method('PUT') 
                        @csrf
                            @foreach ($roles as $role)
                            <div class="form-check">
                            <label class="form-label">{{$role->name}}</label>
                            <input class="form-control" type="checkbox"  name="roles[]" value="{{$role->id}}" @if($user->roles->pluck('id')->contains($role->id)) checked @endif>
                            </div>
                            @endforeach

                            <button class="btn btn-success" type="submit" name="save">Update
                        </form>
                    </div>
            </div>
        </div>
    </div>
</main>
@endsection