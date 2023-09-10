<?php

namespace App\Http\Controllers;

use Request;
use App\Models\Blog;
use App\Models\User;
use App\Http\Requests\ComposeRequest;
use App\Http\Requests\EditRequest;
use App\Http\Requests\ActivityLogRequest;
use App\Models\Activity;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\DeleteBlogRequest;

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
        $blog->update();

        $name = $blog->title;
        return redirect()->route('logger.onEditBlog', ['name' => $name]);
    }

    public function delete($id, ActivityLogRequest $logRequest)
    {
        $blog = Blog::find($id);
        $name = $blog->title;
        $blog->delete();

        $logData = $logRequest->validated();
        return redirect()->route('logger.onDeleteBlog', ['name' => $name]);
    }
}
