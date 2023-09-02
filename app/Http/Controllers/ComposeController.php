<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ComposeRequest;
use App\Models\Blog;

class ComposeController extends Controller
{
    public function index()
    {
        return view('dashboard.compose');
    }

    public function store(ComposeRequest $request)
    {
        $validated = $request->validated();

        $blog = new Blog();
        $blog->title = $validated['title'];
        $blog->author = $validated['author'];
        $blog->content = $validated['content'];
        $blog->save();

        return redirect()->route('dashboard.page');
    }
}
