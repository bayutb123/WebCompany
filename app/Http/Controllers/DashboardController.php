<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;
use App\Http\Requests\ComposeRequest;
use App\Http\Requests\EditRequest;
use Illuminate\Support\Facades\Storage;

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

    public function blogs()
    {
        $blogs = Blog::orderBy('id', 'DESC')->get();
        $user = auth()->user();
        return view('dashboard.blogs')->with('user', $user)->with('blogs', $blogs);
    }

    public function blog($id)
    {
        $blog = Blog::find($id);
        $user = auth()->user();
        $allusers = User::all();
        $blog->content = str_replace("uploads/", "/storage/uploads/", $blog->content); // Fix image path // Fix image path
        return view('dashboard.blogs')->with('user', $user)->with('blog', $blog)->with('allusers', $allusers);
    }

    public function edit($id)
    {
        $blog = Blog::find($id);
        $blog->content = str_replace("../../uploads", "/uploads/", $blog->content); // Fix image path
        $user = auth()->user();
        $allusers = User::all();
        $blog->content = str_replace("\"storage/uploads/", "\"/storage/uploads/", $blog->content); // Fix image path
        return view('dashboard.edit-blog')->with('user', $user)->with('blog', $blog)->with('allusers', $allusers);
    }

    public function update(EditRequest $request) 
    {
        $blog = Blog::find($request->id);
        $validated = $request->validated();
        $blog->title = $validated['title'];
        $blog->content = $validated['content'];
        $photo = $request->file('image');
        if ($photo) {
            $filename = date('Y-m-d').$photo->getClientOriginalName();
            $path = 'blog-banner/'.$filename;
            Storage::disk('public')->put($path, file_get_contents($photo));
            $blog->image = $filename;
        }
        $blog->save();
        return redirect()->route('blogs.page');
    }

    public function delete($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        return redirect()->route('blogs.page');
    }
}
