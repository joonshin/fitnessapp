@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Movement</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{ $movement->name }}</td>
            </tr>
          </tbody>
          <thead>
            <tr>
              <th>User</th>
              <th>Weight</th>
              <th>Time</th>
              <th>Reps</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($usermovements as $usermovement)
              @if ($movement->id == $usermovement->movement_id)
                <tr>
                  <td>{{ $usermovement->user->name }}</td>
                  <td>{{ $usermovement->weight }}</td>
                  <td>{{ $usermovement->time }}</td>
                  <td>{{ $usermovement->reps }}</td>
                </tr>
              @endif
            @endforeach
          </tbody>
        </table>
    </div>
</div>
@endsection
