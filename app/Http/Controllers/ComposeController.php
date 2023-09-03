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
        $user = auth()->user();
        return view('dashboard.compose')->with('user', $user);
    }

    public function upload(Request $request){
        $fileName=$request->file('file')->getClientOriginalName();
        $path=$request->file('file')->storeAs('uploads', $fileName, 'public');
        return response()->json(['location'=>"/storage/$path"]); 
        
        /*$imgpath = request()->file('file')->store('uploads', 'public'); 
        return response()->json(['location' => "/storage/$imgpath"]);*/

    }

    public function store(ComposeRequest $request)
    {
        $validated = $request->validated();

        $photo = $request->file('image');
        $filename = date('Y-m-d').$photo->getClientOriginalName();
        $path = 'blog-banner/'.$filename;

        $user = auth()->user();

        Storage::disk('public')->put($path, file_get_contents($photo));

        $blog = new Blog();
        $blog->title = $validated['title'];
        $blog->author = $user->id;
        $blog->content = $validated['content'];
        $blog->image = $filename;
        $blog->save();

        return redirect()->route('dashboard.page');
    }

}
