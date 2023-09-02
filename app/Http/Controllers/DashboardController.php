<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class DashboardController extends Controller
{
    public function index()
    {
        $latestblogs = Blog::latest()->take(3)->orderBy('id', 'DESC')->get();
        foreach ($latestblogs as $blog) {
            $blog->content = str_replace("uploads/", "/uploads/", $blog->content); // Fix image path
        }
        $user = auth()->user();
        return view('dashboard.index')->with('user', $user)->with('latestblogs', $latestblogs);
    }

}
