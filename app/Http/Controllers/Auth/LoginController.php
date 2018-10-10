<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    public function showLoginForm(Request $request)
    {
        if($request->has('redirect_to')){
            /*creamos variable de sesion*/
            session()->put('redirect_to',$request->input('redirect_to'));
        }
        return view('auth.login');
    }

    public function redirectTo(){
        if(session()->has('redirect_to')){
            /*obtenemos y eliminamos la variable de sesion*/
            return session()->pull('redirect_to');
        }

        return $this->redirectTo;
    }

}
