<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Validator;
// use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class AuthController extends Controller
{

    /**
     * Display login of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function login()
    {
        $title = "Login";
        $description = "Some description for the page";
        return view('auth.login', compact('title', 'description'));
    }

    /**
     * Display register of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function register()
    {
        $title = "Register";
        $description = "Some description for the page";
        return view('auth.register', compact('title', 'description'));
    }

    /**
     * Display forget password of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function forgetPassword()
    {
        $title = "Forget Password";
        $description = "Some description for the page";
        return view('auth.forget_password', compact('title', 'description'));
    }

    /**
     * make the user able to register
     *
     * @return 
     */
    public function signup(Request $request)
    {
        $validators = FacadesValidator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);
        if ($validators->fails()) {
            return redirect()->route('register')->withErrors($validators)->withInput();
        } else {
            $user = User::query()->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'tenant_id' => null
            ]);
            auth()->login($user);
            return redirect()->intended(route('dashboard'))->with('message', 'Registration was successfull !');
        }
    }

    /**
     * make the user able to login
     *
     * @return 
     */
    public function authenticate(Request $request)
    {
        
        $validators = FacadesValidator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if ($validators->fails()) {
            return redirect()->route('login')->withErrors($validators)->withInput();
        } else {
            if (FacadesAuth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->intended(route('dashboard'))->with('message', 'Welcome back !');
            } else {
                return redirect()->route('login')->with('message', 'Login failed !Email/Password is incorrect !');
            }
        }
    }

    /**
     * make the user able to logout
     *
     * @return 
     */
    public function logout()
    {
        FacadesAuth::logout();
        return redirect()->route('login')->with('message', 'Successfully Logged out !');
    }
}
