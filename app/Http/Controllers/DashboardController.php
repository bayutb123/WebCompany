<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class DashboardController extends Controller
{
    public function index()
    {
        $latestblogs = Blog::latest()->take(3)->orderBy('id', 'DESC')->get();
        $user = auth()->user();
        return view('dashboard.index')->with('user', $user)->with('latestblogs', $latestblogs);
    }

}
