@extends('layouts.base')

@section('content')
<div>
  <div class="list-header">
    <h3>Task list</h3>
    <a class="btn light-green" href="{{ route('task.create') }}">Add new task</a>
  </div>
  
  {{-- <p class="mssg">{{ session('mssg') }}</p> --}}
  <div class="task-list">
    @foreach ($tasks as $task)
      <div class="task {{ $task->complete === 1 ? 'task-complete' : 'task-ongoing' }}">
        <div class="task-header">
          <h6> {{ $task->name }} <small> ( {{ $task->complete === 0 ? 'On going' : 'Completed' }} )</small></h6>
          <div class="task-options">
            <a class="btn orange" href="{{ route('task.edit', $task->id) }}">Edit</a>
            <form action="{{ route('task.destroy', $task->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn red">Delete</button>
            </form>
          </div>
        </div>
        <div class="task-body">
          <h5>Assigned to: {{ $task->user->name }}</h5><br>
          <h6>Start at: {{ $task->start_at }}</h6>
          <h6>End at: {{ $task->end_at }}</h6>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection
