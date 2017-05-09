@extends('layouts.app')

@section('title', 'User Movement Index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h2>User Movements</h2>
          <div class="row">
            <a href="{{ route('usermovements.create')}}" class="btn btn-default pull-right">Create New User Movement</a>
          </div>
          @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
          @endif
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>UM ID</th>
                  <th>User</th>
                  <th>Movement</th>
                  <th>Weight</th>
                  <th>Time</th>
                  <th>Reps</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @forelse ($usermovements as $usermovement)
                  <tr>
                    <td>{{ $usermovement->id }}</td>
                    <td><a href="{{ route('usermovements.show', [$usermovement]) }}">{{ $usermovement->user->name }}</a></td>
                    <td><a href="{{ route('usermovements.show', [$usermovement]) }}">{{ $usermovement->movement->name }}</a></td>
                    <td><a href="{{ route('usermovements.show', [$usermovement]) }}">{{ $usermovement->weight }}</a></td>
                    <td><a href="{{ route('usermovements.show', [$usermovement]) }}">{{ $usermovement->time }}</a></td>
                    <td><a href="{{ route('usermovements.show', [$usermovement]) }}">{{ $usermovement->reps }}</a></td>
                    <td>
                      <a href="{{ route('usermovements.edit', [$usermovement]) }}" class="btn btn-default btn-xs">Edit</a>
                    </td>
                    <td>
                      <form action="{{ route('usermovements.destroy', [$usermovement]) }}" method="post">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                      <button type="submit" class="btn btn-default btn-xs">Delete</button>
                    </form>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="3">This account currently has no user movements. <a href="{{ route('usermovements.create') }}">Create one.</a>
                  </tr>
                @endforelse
              </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
