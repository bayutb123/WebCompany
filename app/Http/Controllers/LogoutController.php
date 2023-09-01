<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Session;

class LogoutController extends Controller
{
    public function logout()
    {
        Session::flush();
        auth()->logout();
        return redirect('/login');
    }
}
