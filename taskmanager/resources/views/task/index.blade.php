@extends('layouts.base')

@section('content')
<div>
  <div class="task-list-header">
    <h1>Task List:</h1>
    <a href="{{ route('task.create') }}"><button>Add new task</button></a>
  </div>
  
  <p class="mssg">{{ session('mssg') }}</p>
  <div class="task-list">
    @foreach ($tasks as $task)
      <div class="task">
        <div class="task-header">
          <h1> {{ $task->name }} {{ $task->last_name }}</h1>
          {{-- <h3>Group: {{ $contact->group ? $contact->group->name : 'No group asigned' }}</h3> --}}
          <div class="task-options">
            <a href="{{ route('task.edit', $task->id) }}"><button>Edit task</button></a>
            <form action="{{ route('task.destroy', $task->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button>Delete task</button>
            </form>
          </div>
        </div>
        
        <h4>Asigned to: {{ $task->user->name }}</h4>
        <h5>Start at: {{ $task->start_at }}</h5>
        <h5>End at: {{ $task->end_at }}</h5>
      </div>
    @endforeach
  </div>
</div>
@endsection
