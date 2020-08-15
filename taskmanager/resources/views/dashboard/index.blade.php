@extends('layouts.base')

@section('content')
<div class="dashboard">
  <div class="app-title">
    <h1>Task Manager App</h1>
  </div>
  <div class="dashboard-box total-users">
    <h1>{{ $users }}</h1>
    <h4>Total users</h4>
  </div>
  <div class="dashboard-box ongoing-tasks">
    <h1>{{ $taskCount }}</h1>
    <h4>On going tasks</h4>
  </div>
  <div class="dashboard-box completed-tasks">
    <h1>{{ $taskCount }}</h1>
    <h4>Completed tasks</h4>
  </div>
  <div class="dashboard-box total-tasks">
    <h1>{{ $taskCount }}</h1>
    <h4>Total tasks</h4>
  </div>
</div>
@endsection
