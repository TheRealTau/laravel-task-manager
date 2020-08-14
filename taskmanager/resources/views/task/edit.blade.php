@extends('layouts.base')

@section('content')
<div class="content-wrapper">
  <div class="crud-form">
    <h1>Task editor</h1>
    <form action="{{ route('task.update', $task->id) }}" method="POST">
      @csrf
      @method('PATCH')
      <label for="name">Contact name</label>
      <input type="text" id="name" name="name" value="{{ $task->name }}"><br>
      {{ $errors->first('name') }}<br>

      <label for="user-select">User asigned:</label>
      <select name="user_id" id="user-select">
        <option value="{{ $task->user->id }}">{{ $task->user->name }}</option>
        @foreach ( $users as $user )
          @if ( $task->user->id !== $user->id )
            <option value="{{ $user->id }}">{{ $user->name }}</option>
          @endif
        @endforeach
      </select><br>
      <div class="create-button">
        <input type="submit" value="Update task">
      </div>
    </form>
    <a href="{{ route('task.index') }}">Return to task list</a>
  </div>
</div>
@endsection
