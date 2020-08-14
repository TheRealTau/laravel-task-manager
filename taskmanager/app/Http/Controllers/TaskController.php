<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\User;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('name', 'asc')->get();
    
        return view('task.index', ['tasks' => $tasks]);
    }

    public function create()
    {
        $tasks = Task::orderBy('name', 'asc')->get();
        $users = User::orderBy('name', 'asc')->get();

        return view('task.create', ['tasks' => $tasks, 'users' => $users]);
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'name'=>'required'
        ]);

        $task = new Task($data);
        $task->save();

        return redirect(route('task.index'))->with('mssg', 'Task added to agenda');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        // $groups = Group::orderBy('name', 'asc')->get();
        $task = Task::findOrFail($id);
        $users = User::orderBy('name', 'asc')->get();

        return view('task.edit', ['task'=>$task, 'users'=>$users]);
    }

    public function update(Request $request, $id)
    {
        $data = request()->validate([
            'name'=>'required',
            // 'last_name'=>'required',
            // 'phone_number'=>'required|max:15',
            // 'email'=>'required|email',
        ]);
        
        $task = Task::findOrFail($id);
        $task->update($data);

        return redirect(route('task.index'))->with('mssg', 'Task info updated');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect(route('task.index'))->with('mssg', 'Task deleted from agenda');
    }
}
