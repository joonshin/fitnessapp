@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      {{ $usermovement->id }} <br>

      @foreach ($users as $user)
        @if ($user->id == $usermovement->user_id)
            {{ $user->name }}
        @endif
      @endforeach <br>

      @foreach ($movements as $movement)
        @if ($movement->id == $usermovement->movement_id)
            {{ $movement->name }}
        @endif
      @endforeach <br>

      Weight: {{ $usermovement->weight }} <br>
      Time: {{ $usermovement->time }} <br>
      Reps: {{ $usermovement->reps }}
    </div>
</div>
@endsection
