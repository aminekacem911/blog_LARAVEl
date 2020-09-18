@extends('layouts.app')

@section('content')
<main class="main-container">
  <section class="section-container">
      <div class="container-fluid">
              <div class="cardbox">
                <div class="cardbox-heading">Responsive tables</div>
                  <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Row #</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Operations</th>
                          </tr>
                        </thead>
                        <tbody>@foreach ($users as $user)
                          <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{ implode(',', $user->roles()->get()->pluck('name')->toArray())}}</td>
                            @if ($user->hasRole('admin'))
                            <td> 
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <form action="{{ route('admin.users.edit',$user->id)}}" method="post">
                                  @csrf
                                  <button class="btn btn-info btn-oval" type="submit" disabled>Edit</button>
                              </form>
                              <!--<a class="btn btn-info btn-oval" href="route('admin.users.edit',$user->id)" >Edit</a>&nbsp; !-->
                                    <form action="{{ route('admin.users.destroy', $user)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-oval" type="submit" disabled>Delete</button>
                                    </form>
                                    <form action="{{ route('admin.users.ban', $user)}}" method="post">
                                        @csrf                                 
                                        <button  class="btn btn-warning btn-oval" type="submit" disabled>Ban</button>
                                    </form>
                              </div>   
                            </td>
                          @else
                          <td> 
                            <div class="btn-group" role="group" aria-label="Basic example">
                              <form action="{{ route('admin.users.edit',$user->id)}}" method="post">
                                @csrf
                                <button class="btn btn-info btn-oval" type="submit">Edit</button>
                            </form>
                            <!--<a class="btn btn-info btn-oval" href="route('admin.users.edit',$user->id)" >Edit</a>&nbsp; !-->
                                  <form action="{{ route('admin.users.destroy', $user)}}" method="post">
                                      @csrf
                                      @method('DELETE')
                                      <button class="btn btn-danger btn-oval" type="submit">Delete</button>
                                  </form>
                                  <form action="{{ route('admin.users.ban', $user)}}" method="post">
                                      @csrf                                 
                                      <button  class="btn btn-warning btn-oval" type="submit">Ban</button>
                                  </form>
                            </div>   
                          </td>
                          @endif
                      </tr>   
                      @endforeach     
                         </tbody>
                      </table>
                  </div>
              </div>
           </div>
        </div>
      </div>
  </section>
</main>
@endsection
