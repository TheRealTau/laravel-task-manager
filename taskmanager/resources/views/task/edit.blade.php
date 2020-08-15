@extends('layouts.base')

@section('content')
<div class="container">
  <div class="container">
    <h3>Task editor</h3>
    <form action="{{ route('task.update', $task->id) }}" method="POST">
      @csrf
      @method('PATCH')
      <label for="name">Task name</label>
      <input type="text" id="name" name="name" value="{{ $task->name }}"><br>
      {{ $errors->first('name') }}<br>
      <div class="row">
        <div class="col s6">
          <label for="user_id">User asigned:</label>
          <select name="user_id" id="user_id">
            <option value="{{ $task->user->id }}">{{ $task->user->name }}</option>
            @foreach ( $users as $user )
              @if ( $task->user->id !== $user->id )
                <option value="{{ $user->id }}">{{ $user->name }}</option>
              @endif
            @endforeach
          </select><br>
          {{ $errors->first('user_id') }}<br>
        </div>
        <div class="input-field col s6">
          <label>
            <input type="checkbox" name="complete" class="filled-in" {{ $task->complete === 1 ? 'checked' : '' }}/>
            <span>Task complete</span>
          </label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <div class="input-field row s6">
            <label for="strat_date">Start date</label>
            <input type="text" class="datepicker"  name="start_date" value="{{ $start_date }}">
          </div>
          <div class="input-field row">
            <label for="start_time">Start time</label>
            <input type="text" class="timepicker"  name="start_time" value="{{ $start_time }}">
          </div>
        </div>
        <div class="input-field col s6">
          <div class="input-field row s6">
            <label for="end_date">End date</label>
            <input type="text" class="datepicker"  name="end_date" value="{{ $end_date }}">
          </div>
          <div class="input-field row">
            <label for="end_time">End time</label>
            <input type="text" class="timepicker"  name="end_time" value="{{ $end_time}}">
          </div>
        </div>
      </div>
      <div class="create-button">
        <input type="submit" value="Update task" class="btn light-green">
      </div>
    </form>
    <a href="{{ route('task.index') }}">Return to task list</a>
  </div>
</div>
@endsection
