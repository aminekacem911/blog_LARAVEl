@extends('layouts.app')
@section('content')
  <div class="page-container bg-blue-grey-900">
    <div class="d-flex align-items-center align-items-center-ie bg-gradient-primary">
      <div class="fw">
        <div class="container container-xs">
          <form class="cardbox cardbox-flat text-white form-validate text-color" method="POST"  enctype="multipart/form-data" action="{{ route('register') }}" >
            @csrf
            <div class="cardbox-heading">
              <div class="cardbox-title text-center">Register</div>
            </div>
            <div class="cardbox-body">
              <div class="px-5">
                <div class="form-group">
                    <input class="form-control form-control-inverse" type="text" name="name" required="" placeholder="Name">
                  </div>
                <div class="form-group">
                  <input class="form-control form-control-inverse" type="email" name="email" required="" placeholder="Email address">
                </div>
                <div class="form-group">
                  <input class="form-control form-control-inverse" type="password" name="password" required="" placeholder="Password" value="123456789">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-inverse" type="password" name="password_confirmation" required="" value="123456789" placeholder="Confirm Password">
                </div>
                <div class="form-group">
                  <input class="form-control form-control-inverse" type="file" name="image" required="" placeholder="Upload image">
                </div>
                <div class="text-center my-4">
                  <button class="btn btn-lg btn-gradient btn-oval btn-info btn-block" type="submit">Register</button>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
