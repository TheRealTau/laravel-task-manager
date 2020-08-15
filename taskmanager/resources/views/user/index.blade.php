@extends('layouts.base')

@section('content')
<div>
  <div class="task-list-header">
    <h3>User List:</h3>
  </div>
  
  {{-- <p class="mssg">{{ session('mssg') }}</p> --}}
  {{-- <div class="task-list"> --}}
    <ul class="collapsible">
      @foreach ($users as $user)
        <li class="user">
          <div class="collapsible-header">
            <div class="user-header">
              <h4>{{ $user->name }}</h4>
              <h6>Task asigned: {{ $user->task ? $user->task->count() : 0 }}</h6>
            </div>
          </div>
          <div class="collapsible-body">
            <small>Tasks asigned</small>
            <ul class="user-body">
              @forelse ($user->task as $task)
                <li>
                  <h6>{{ $task->name }}</h6>
                </li>
              @empty
              <li>
                <h6>No tasks asigned</h6>
              </li>
              @endforelse
            </ul>
          </div> 
        </li>
      @endforeach
    </ul>
  {{-- </div> --}}
</div>
@endsection
