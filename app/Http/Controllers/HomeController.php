<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'WebCompany';
        $blogs = Blog::orderBy('id', 'DESC')->paginate(3);
        return view('home')->with('title', $title)->with('blogs', $blogs);
    }

    public function blog()
    {
        return view('blog');
    }
}
