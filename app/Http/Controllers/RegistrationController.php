<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function index(){
        return view('register');
    }
    public function insert(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'phone' => 'required|string|max:15',
            'picture' => 'required',
            'password' => 'required|min:6|max:8|confirmed', 
        ]);
    
    
        $user = new User;
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->phone = $validatedData['phone'];
        $user->picture = $request->file('picture')->store('uploads/user', 'public');
        $user->password = Hash::make($validatedData['password']);
    
        
        if ($user->save()) {
            return redirect('login')->with('success', "User Registration Successful");
        } else {
            return view('register')->with('error', 'Registration failed. Please try again.');
        }
    }
    
}
