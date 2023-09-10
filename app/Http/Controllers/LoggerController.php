<?php

namespace App\Http\Controllers;

use Request;
use App\Models\User;
use App\Http\Requests\ActivityLogRequest;
use App\Models\Activity;

class LoggerController extends Controller
{
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
}
