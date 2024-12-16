<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;



class LoginController extends Controller
{
    public function index(){
        return view('login');
    }
    public function insert(Request $request)
{

    $validated = $request->validate([
        'email' => 'required|email|max:255',
        'password' => 'required',
    ]);


    if (Auth::attempt([
        'email' => $validated['email'],
        'password' => $validated['password']
    ])) {
        $user = Auth::user(); 
        if ($user->type ==='customer'){
            return redirect('dashboard')->with('success', 'Login Successful');
        }else{
            return redirect('login')->with('success', 'Logout Successful');
        }
       
    } else {

        return redirect()->back()->with('error', 'Email/Password is Incorrect!');
    }
}
public function logout(){
    Auth::logout();
    return redirect('login')->with('success', 'Logout Successful');
}

}
