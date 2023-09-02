<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'WebCompany';
        return view('home')->with('title', $title);
    }

    public function blog()
    {
        return view('blog');
    }
}
