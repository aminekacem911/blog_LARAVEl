@extends('layouts.app')
@section('content')
  <div class="page-container bg-blue-grey-900">
    <div class="d-flex align-items-center align-items-center-ie bg-gradient-primary">
      <div class="fw">
        <div class="container container-xs">
          <form class="cardbox cardbox-flat text-white form-validate text-color" method="POST"  action="{{ route('login') }}" >
            @csrf
            <div class="cardbox-heading">
              <div class="cardbox-title text-center">Login</div>
            </div>
            <div class="cardbox-body">
              <div class="px-5">
                <div class="form-group">
                  <input class="form-control form-control-inverse" type="email" name="email" required="" placeholder="Email address">
                </div>
                <div class="form-group">
                  <input class="form-control form-control-inverse" type="password" name="password" required="" placeholder="Password">
                </div>
                <div class="form-group mt-4">
                  <div class="custom-control custom-checkbox mb-0">
                    <input class="custom-control-input" id="logcheck" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="custom-control-label" for="logcheck">Keep me logged in</label>
                  </div>
                </div>
                <div class="text-center my-4">
                  <button class="btn btn-lg btn-gradient btn-oval btn-info btn-block" type="submit">Authenticate</button>
                </div>
              </div>
              @if (Route::has('password.request'))
              <div class="text-center"><small><a class="text-inherit" href="{{ route('password.request') }}">Forgot password?</a></small></div>
            </div>
            @endif
        <div class="cardbox-footer text-center text-sm"><span class="mr-2">No account yet?</span><a class="text-inherit" href="{{route('register')}}"><strong>Register Now</strong></a></div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
