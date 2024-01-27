<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegisterFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function store(RegisterFormRequest $request)
    {

        $validatedData= $request->validated();

       $user= User::create([
            'name'=>$validatedData['name'],
            'email'=>$validatedData['email'],
            'password'=>Hash::make($validatedData['password']),
        ]);
        // Authenticate the user
        auth()->login($user);

        // Retrieve authenticated user data
        $authenticatedUser = auth()->user();

        // Redirect with success message and user data
        return redirect(route('home'))->with([
            'success' => 'Registration successful. You are now logged in.',
            'user' => $authenticatedUser,
        ]);
    }

    public function login()
    {
        return view('auth.login');
    }

    public function check(LoginFormRequest $request)
    {
        $validatedData=$request->validated();

        $rememberMe = $request->has('remember');
         // Check if the 'remember' checkbox is checked

        if(auth()->attempt($validatedData,$rememberMe))
        {
            request()->session()->regenerate();
            
            return redirect(route('home'))->with('success', 'Login successfully');
        }

        return redirect(route('login'))
        ->withErrors(['email'=>'No Match email or password credential',]);
    }

    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();
        
        request()->session()->regenerate();

        return redirect(route('home'))->with('success', 'Logout successfully');;
    }
}
