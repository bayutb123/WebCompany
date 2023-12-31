<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('id', 'DESC')->paginate(10);

        $recentblogs = Blog::latest()->take(3)->orderBy('id', 'DESC')->get();

        $categories = Blog::select('category')->distinct()->get();  

        return view('blog')->with('blogs', $blogs)->with('recentblogs', $recentblogs)->with('categories', $categories);
    }

    public function show($id)
    {
        $blog = Blog::find($id);
        
        $blog->content = str_replace("\"storage/", "\"/storage/", $blog->content); // Fix image path

        $authorid = $blog->author;
        $authorname = User::find($authorid)->name;

        $recentblogs = Blog::latest()->take(5)->orderBy('id', 'DESC')->get();

        return view('blogdetails')->with('blog', $blog)->with('authorname', $authorname)->with('recentblogs', $recentblogs);
    }

    public function category($category)
    {
        $blogs = Blog::where('category', $category)->orderBy('id', 'DESC')->paginate(10);

        $recentblogs = Blog::latest()->take(3)->orderBy('id', 'DESC')->get();

        $categories = Blog::select('category')->distinct()->get();  

        return view('blog')->with('blogs', $blogs)->with('recentblogs', $recentblogs)->with('categories', $categories);
    }

}
