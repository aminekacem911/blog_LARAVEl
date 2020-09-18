@extends('layouts.app')
@section('content')
  <div class="page-container bg-blue-grey-900">
    <div class="d-flex align-items-center align-items-center-ie bg-gradient-primary">
      <div class="fw">
        <div class="container container-xs">
            <div class="cardbox-heading">
              <div class="cardbox-title text-center">{{ __('Reset Password') }}</div>
            </div>
            <div class="cardbox-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                    </div>
                @endif
                <form class="cardbox cardbox-flat text-white form-validate text-color" method="POST"  action="{{ route('password.email') }}" >
                    @csrf
                    <div class="px-5">              
                        <div class="form-group">
                            <input class="form-control form-control-inverse" type="email" name="email" required="" placeholder="Email address">
                        </div>
                        <div class="text-center my-4">
                         <button class="btn btn-lg btn-gradient btn-oval btn-info btn-block" type="submit">{{ __('Send Password Reset Link') }}</button>
                        </div>
                    </div>
                </form>
            </div>
      </div>
    </div>
  </div>
@endsection
