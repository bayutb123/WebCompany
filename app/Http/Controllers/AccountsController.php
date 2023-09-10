<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\EditAccountRequest;
use Illuminate\Support\Facades\Storage;

class AccountsController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $response = null;
        return view('dashboard.account') -> with('user', $user) -> with('response', $response);
    }    

    public function update(EditAccountRequest $request)
    {
        $validated = $request->validated();

        $user = auth()->user();

        $user->name = $validated['name'];
        $user->bio = $validated['bio'];

        if($request->hasFile('image')){
            $photo = $request->file('image');
            $filename = date('Y-m-d').$photo->getClientOriginalName();
            $path = 'profile/'.$filename;
            Storage::disk('public')->put($path, file_get_contents($photo));
            $user->image = $filename;
        }

        $user->save();

        return redirect()->route('logger.onEditAccount');
    }
    
}
