<?php

namespace App\Http\Controllers;

use Request;
use App\Models\User;
use App\Http\Requests\ActivityLogRequest;
use App\Models\Activity;

class LoggerController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $logs = Activity::where('user_id', $user->id)->orderBy('id', 'DESC')->get();
        return view('dashboard.logs')->with('user', $user)->with('logs', $logs);
    }

    public function onDeleteBlog($name)
    {
        $user = auth()->user();
        $log = new Activity();
        $log->user_id = $user->id;
        $log->log_type = 'Delete Blog';
        $log->log_message = 'Deleted blog with name: '.$name;
        $log->log_ip = Request::ip();
        $log->save();

        return redirect()->route('blogs.page');
    }

    public function onEditBlog($name)
    {
        $user = auth()->user();
        $log = new Activity();
        $log->user_id = $user->id;
        $log->log_type = 'Edit Blog';
        $log->log_message = 'Edited blog with name: '.$name;
        $log->log_ip = Request::ip();
        $log->save();

        return redirect()->route('blogs.page');
    }

    public function onComposeBlog($name)
    {
        $user = auth()->user();
        $log = new Activity();
        $log->user_id = $user->id;
        $log->log_type = 'Add Blog';
        $log->log_message = 'Added a new blog with name: '.$name;
        $log->log_ip = Request::ip();
        $log->save();

        return redirect()->route('dashboard.page');
    }

    public function onEditAccount()
    {
        $user = auth()->user();
        $log = new Activity();
        $log->user_id = $user->id;
        $log->log_type = 'Edit Account';
        $log->log_message = 'Edited account profile';
        $log->log_ip = Request::ip();
        $log->save();

        return redirect()->route('account.page');
    }

    public function onRegisterNewAccount($name) 
    {
        $user = auth()->user();
        $log = new Activity();
        $log->user_id = $user->id;
        $log->log_type = 'Register Account';
        $log->log_message = 'Registered a new account with name: '.$name;
        $log->log_ip = Request::ip();
        $log->save();

        return redirect()->route('dashboard.page');
    }
}
