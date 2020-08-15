@extends('layouts.base')

@section('content')
<div>
  <div class="list-header">
    <h3>User list</h3>
  </div>
  
  <div class="task-list">
    <ul class="collapsible">
      @foreach ($users as $user)
        <li class="user">
          <div class="collapsible-header">
            <div class="user-header">
              <h4>{{ $user->name }}</h4>
              <h6>Tasks assigned {{ $user->tasks ? $user->tasks->count() : 0 }}</h6>
            </div>
          </div>
          <div class="collapsible-body">
            <small>Tasks asigned</small>
            <ul class="user-body">
              @forelse ($user->tasks as $task)
                <li>
                  <h6>{{ $task->name }}<small> ( {{ $task->complete === 0 ? 'On going' : 'Completed' }} )</small></h6>
                  <h7>start: {{ $task->start_at }}</h7><br>
                  <h7>end: {{ $task->end_at }}</h7>
                </li>
              @empty
              <li>
                <h6>No tasks assigned</h6>
              </li>
              @endforelse
            </ul>
          </div> 
        </li>
      @endforeach
    </ul>
  </div>
</div>
@endsection
