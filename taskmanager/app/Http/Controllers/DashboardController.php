<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Task;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name', 'asc')->get()->count();
        $task = Task::all();
        $taskCount = $task->count();
        $taskComplete = $task->where('complete', 1)->count();
        $taskOngoing = $task->where('complete', 0)->count();
        return view('dashboard.index', [
            'users'=>$users,
            'taskCount'=>$taskCount,
            'taskComplete'=>$taskComplete,
            'taskOngoing'=>$taskOngoing
        ]);
    }
}
