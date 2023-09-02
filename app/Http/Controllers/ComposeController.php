<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ComposeRequest;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;

class ComposeController extends Controller
{
    public function index()
    {
        return view('dashboard.compose');
    }

    public function store(ComposeRequest $request)
    {
        $validated = $request->validated();

        $photo = $request->file('image');
        $filename = date('Y-m-d').$photo->getClientOriginalName();
        $path = 'blog-banner/'.$filename;

        
        Storage::disk('public')->put($path, file_get_contents($photo));


        $blog = new Blog();
        $blog->title = $validated['title'];
        $blog->author = $validated['author'];
        $blog->content = $validated['content'];
        $blog->image = $filename;
        $blog->save();

        return redirect()->route('dashboard.page');
    }
}
