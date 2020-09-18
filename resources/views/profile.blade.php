@extends('layouts.app')

@section('content')
<main class="main-container">
  <!-- Page content-->
  <section class="section-container">
    <div class="container-overlap bg-gradient-info text-center">
    <div class="mb-3"><img class="wd-sm rounded-circle img-thumbnail" src="{{Auth::user()->image}}" alt="user"></div>
      <div class="text-white">
        <div class="h3">{{Auth::user()->name}}</div>
      </div>
    </div>
    <div class="container container-md">
      <form class="cardbox">
        <div class="row cardbox-heading ">
            <div class="col-md-9">
                <h5 class="pb-0">Personal Information</h5>
            </div>
            <div class="col-md-3">
                <button class="mr-8 mb-6 btn bg-gradient-danger btn-gradient"  type="button" data-toggle="modal" data-target=".demo-modal-profile"><i class="fa fa-edit"></i> EDIT</button>
                <div class="modal fade demo-modal-profile">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="mt-0 modal-title">Update profile</h5>
                          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span>&times;</span></button>
                        </div>
                        <div class="modal-body">
                        <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data" >
                            @csrf 
                            <input type="hidden"  name="id" value="{{Auth::user()->id}}">
                            <div class="form-group">
                                <label class="label-group">name</label>
                            <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}">
                            </div>
                            <div class="form-group">
                                <label class="label-group">email</label>
                                <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}">
                            </div>
                            <div class="form-group">
                                <label class="label-group">password</label>
                                <input type="password" class="form-control" name="password" value="{{Auth::user()->password}}">
                                <input type="hidden"  name="image" value="{{Auth::user()->image}}"> 
                            </div>
                            <button class="btn btn-primary btn-oval" type="submit">Update</button>
                        </form>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
          <table class="table table-striped mb-0">
            <tbody>
              <tr>
                <td><em class="ion-document-text icon-fw mr-3"></em>Area</td>
                <td>Research &amp; development</td>
              </tr>
              <tr>
                <td><em class="ion-egg icon-fw mr-3"></em>Birthday</td>
                <td><span class="is-editable text-inherit">10/11/2000</span></td>
              </tr>
              <tr>
                <td><em class="ion-android-home icon-fw mr-3"></em>Address</td>
                <td><span class="is-editable text-inherit">Some street, 123</span></td>
              </tr>
              <tr>
                <td><em class="ion-email icon-fw mr-3"></em>Email</td>
                <td><span class="is-editable text-inherit"><a href="#">{{Auth::user()->email}}</a></span></td>
              </tr>
              <tr>
                <td><em class="ion-ios-telephone icon-fw mr-3"></em>Contact phone</td>
                <td><span class="is-editable text-inherit">13-123-46578</span></td>
              </tr>
            </tbody>
          </table>
        </div>
      </form>
    </div>
  </section>
@endsection