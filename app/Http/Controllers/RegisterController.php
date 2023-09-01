<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('dashboard.register');
    }

    public function register(RegisterRequest $request) 
    {
        $user = User::create($request->validated());
        auth()->login($user);
        return redirect('/dashboard')->with('success', 'Account created successfully');
    }
}
