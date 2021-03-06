@extends('layouts.base')

@section('content')
<div class="container">
  <div class="container">
    <h3>New task</h3>
    <form action="{{ route('task.store') }}" method="POST">
      @csrf
      <label for="name">Task name</label>
      <input type="text" id="name" name="name" value="{{ old('name') }}"><br>
      {{ $errors->first('name') }}<br>

      <label for="user-select">User asigned:</label>
      <select name="user_id" id="user-select">
        <option value="" disabled selected>Choose an user</option>
        @foreach ( $users as $user )
          <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
      </select><br>
      {{ $errors->first('user_id') }}<br>

      <div class="row">
        <div class="input-field col s6">
          <div class="input-field row s6">
            <label for="strat_date">Start date</label>
            <input type="text" class="datepicker"  name="start_date" placeholder="Select start date">
          </div>
          <div class="input-field row">
            <label for="start_time">Start time</label>
            <input type="text" class="timepicker"  name="start_time" placeholder="Select start time">
          </div>
        </div>
        <div class="input-field col s6">
          <div class="input-field row s6">
            <label for="end_date">End date</label>
            <input type="text" class="datepicker"  name="end_date" placeholder="Select end date">
          </div>
          <div class="input-field row">
            <label for="end_time">End time</label>
            <input type="text" class="timepicker"  name="end_time" placeholder="Select end time">
          </div>
        </div>
      </div>
      <div class="create-button">
        <input class="btn light-green" type="submit" value="Create task">
      </div>
    </form>
    <a href="{{ route('task.index') }}">Return to task list</a>
  </div>
</div>
@endsection
