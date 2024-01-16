<?php

namespace App\Http\Controllers;

use App\Models\User;
use Error;
use Throwable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('forms.login', [
            "title" => "Login",
        ]);
    }

    public function post_login(Request $request){
        $credentials = $request->validate([
            'email' => ['email', 'required'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }
        return back()->with('form_toast', [
            'title' => 'Login',
            'description' => 'Wrong email or password.',
            'type' => 'danger'
        ]);
    }

    public function post_logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }

    public function get_register()
    {
        return view('forms.register', [
            "title" => "Register"
        ]);
    }

    public function post_register(Request $request){
        $vaildatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'max:30', 'min:8', 'unique:users'],
            'email' => ['required', 'max:255', 'min:8', 'email:dns', 'unique:users'],
            'password' => ['confirmed', 'min:6'],
        ]);

        $vaildatedData['password'] = Hash::make($vaildatedData['password']);

        try {
            User::create($vaildatedData);
            
            return redirect('/auth/login')->with('form_toast', [
                'title' => 'Register',
                'description' => 'Registraion successfull! Please login.',
                'type' => 'info'
            ]);
        } catch (Throwable $th) {
            return redirect('/auth/register')->with('form_toast', [
                'title' => 'Register',
                'description' => 'Registraion failed! Please try again later.',
                'type' => 'danger'
            ]);
        }
    }
}
