<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\User;


class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tasks = Task::orderBy('updated_at', 'desc')->get();
    
        return view('task.index', ['tasks' => $tasks]);
    }

    public function create()
    {
        $tasks = Task::orderBy('name', 'asc')->get();
        $users = User::orderBy('name', 'asc')->get();

        return view('task.create', ['users' => $users]);
    }

    public function store(Request $request)
    {
        request()->validate([
            'name'=>'required',
            'user_id'=>'required',
            'start_date'=>'required',
            'start_time'=>'required',
            'end_date'=>'required',
            'end_time'=>'required'
        ]);

        $task = new Task();
        $task->name = request('name');
        $task->user_id = request('user_id');
        //Concat date and time from materialize pickers and creating date from string
        $strDateTime = request('start_date') ." ". request('start_time');
        $task->start_at = date_create_from_format('Y-m-d H:i A', $strDateTime);
        $strDateTime = request('end_date') ." ". request('end_time');
        $task->end_at = date_create_from_format('Y-m-d H:i A', $strDateTime);
        $task->save();

        return redirect(route('task.index'))->with('mssg', 'Task added to agenda');
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $users = User::orderBy('name', 'asc')->get();

        $start_at = date_create_from_format('Y-m-d H:i:s', $task->start_at);
        $end_at = date_create_from_format('Y-m-d H:i:s', $task->end_at);
        //Slice timestamp into date and time for date and time materialize pickers
        $start_date = date_format($start_at, 'Y-m-d');
        $start_time = date_format($start_at, 'h:i A');
        $end_date = date_format($end_at, 'Y-m-d');
        $end_time = date_format($end_at, 'h:i A');

        return view('task.edit',
            [
            'task'=>$task,
            'users'=>$users,
            'start_date'=>$start_date,
            'start_time'=>$start_time,
            'end_date'=>$end_date,
            'end_time'=>$end_time
            ]);
    }

    public function update(Request $request, $id)
    {
        $data = request()->validate([
            'name'=>'required',
            'user_id'=>'required',
            'start_date'=>'required',
            'start_time'=>'required',
            'end_date'=>'required',
            'end_time'=>'required'
        ]);

        $task = Task::findOrFail($id);
        $task->name = request('name');
        $task->user_id = request('user_id');
        //Concat date and time from materialize pickers and creating date from string
        $strDateTime = request('start_date') ." ". request('start_time');
        // return $strDateTime;
        $task->start_at = date_create_from_format('Y-m-d H:i A', $strDateTime);
        $strDateTime = request('end_date') ." ". request('end_time');
        $task->end_at = date_create_from_format('Y-m-d H:i A', $strDateTime);
        // validate checkbox
        if (request('complete') === 'on'){
            $task->complete = true;
        } else {
            $task->complete = false;
        }
        $task->update();

        return redirect(route('task.index'))->with('mssg', 'Task info updated');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect(route('task.index'))->with('mssg', 'Task deleted from agenda');
    }
}
