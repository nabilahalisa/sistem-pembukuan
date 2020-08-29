<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $maxAttempts = 3;
    protected $decayMinutes = 2;

    public function __construct()
    {
        $this->middleware('guest')->except('postLogout');
    }

    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'password' => 'required|min:5'
        ]);

        if (auth()->guard('web')->attempt($request->only('name', 'password'))) {
            $request->session()->regenerate();
            $this->clearLoginAttempts($request);
            return redirect()->intended(route('dashboard'));
        } else {
            $this->incrementLoginAttempts($request);

            return redirect()
                ->back()
                ->withInput()
                ->withErrors(["Incorrect user login details!"]);
        }
    }

    public function postLogout()
    {
        auth()->guard('web')->logout();
        session()->flush();

        return redirect()->route('login');
    }

    public function redirectTo()
    {
        return redirect()->route('dashboard');
    }
}
