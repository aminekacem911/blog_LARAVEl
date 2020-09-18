<?php

namespace App\Http\Controllers\Auth;
use App\Role;
use App\User;
use Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function redirectTo()
    {
        if (Auth::user()->hasRole('admin')){
            $this->redirectTo = route('admin.index');
            return $this->redirectTo;
        }
        elseif (Auth::user()->hasRole('user') && Auth::user()->isBanned()){
            Auth::logout();
            $this->redirectTo = route('contact');
            return $this->redirectTo;
        }
        else{
            $this->redirectTo = route('post.index');
            return $this->redirectTo;
        }
       
    }
}
