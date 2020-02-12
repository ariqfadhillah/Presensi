<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function login()
    {
    	return view ('auths.login');
    }

    public function postlogin(Request $request)
    {
    	if(Auth::attempt($request->only('email','password'))){
<<<<<<< HEAD
            return Redirect::intended('/dashboard'); //see this line
            
        }else{
                
            return Redirect::to('/login')->with('error', 'Invalid username or password')->withInput();
        }
=======
    		return redirect()->intended('/dashboard');
    	}
    	return redirect('/login');
>>>>>>> github/master
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect('/login');
    }
}
