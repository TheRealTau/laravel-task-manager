@extends('layouts.base')

@section('content')
<div class="content-wrapper">
  <div class="crud-form">
    <h1>New task</h1>
    <form action="{{ route('task.store') }}" method="POST">
      @csrf
      <label for="name">Task name</label>
      <input type="text" id="name" name="name" value="{{ old('name') }}"><br>
      {{ $errors->first('name') }}<br>

      <label for="user-select">User asigned:</label>
      <select name="user_id" id="user-select">
        @foreach ( $users as $user )
          <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
      </select>
      <br>
      <div class="create-button">
        <input type="submit" value="Create task">
      </div>
      
    </form>
    <a href="{{ route('task.index') }}">Return to task list</a>
  </div>
</div>
@endsection
