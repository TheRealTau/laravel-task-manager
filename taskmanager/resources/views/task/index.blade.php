@extends('layouts.base')

@section('content')
<div>
  <div class="task-list-header">
    <h3>Task List:</h3>
    <a class="btn light-green" href="{{ route('task.create') }}">Add new task</a>
  </div>
  
  {{-- <p class="mssg">{{ session('mssg') }}</p> --}}
  <div class="task-list">
    @foreach ($tasks as $task)
      <div class="task">
        <div class="task-header">
          <h4> {{ $task->name }} {{ $task->last_name }}</h4>
          {{-- <h3>Group: {{ $contact->group ? $contact->group->name : 'No group asigned' }}</h3> --}}
          <div class="task-options">
            <a class="btn orange" href="{{ route('task.edit', $task->id) }}">Edit</a>
            <form action="{{ route('task.destroy', $task->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn red">Delete</button>
            </form>
          </div>
        </div>
        
        <h5>Asigned to: {{ $task->user->name }}</h5>
        <h6>Start at: {{ $task->start_at }}</h6>
        <h6>End at: {{ $task->end_at }}</h6>
      </div>
    @endforeach
  </div>
</div>
@endsection
