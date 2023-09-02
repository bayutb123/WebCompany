<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('id', 'DESC')->get();
        $recentblogs = Blog::latest()->take(3)->orderBy('id', 'DESC')->get();
        return view('blog')->with('blogs', $blogs)->with('recentblogs', $recentblogs);
    }

}
