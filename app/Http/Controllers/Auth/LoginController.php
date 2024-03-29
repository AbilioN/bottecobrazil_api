<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function showLoginForm()
    {
        
        return view('admin.login');
    }

    public function login(Request $request)
    {

  
        $credentials = $request->all();
        unset($credentials['_token']);
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        // dd($credentials);
        $authOk = Auth::guard('web')->attempt($credentials);
        if($authOk)
        {
            $user = Auth::user();
            return view('admin.home', compact('user'));
        }

    }
}
