@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
            </tr>
          </tbody>
          <thead>
            <tr>
              <th>Movement</th>
              <th>Weight</th>
              <th>Time</th>
              <th>Reps</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($usermovements as $usermovement)
              @if ($user->id == $usermovement->user_id)
                <tr>
                  <td>{{ $usermovement->movement->name }}</td>
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
