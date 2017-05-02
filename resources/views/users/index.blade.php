@extends('layouts.app')

@section('title', 'User Index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h2>Users</h2>
          <div class="row">
            <a href="{{ route('users.create')}}" class="btn btn-default pull-right">Create New User</a>
          </div>
          @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
          @endif
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Status</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @forelse ($users as $user)
                  <tr>
                    <td>{{ $user->id }}</td>
                    <td><a href="{{ route('users.show', [$user]) }}">{{ $user->name }}</a></td>
                    <td>
                      <a href="{{ route('users.edit', [$user]) }}" class="btn btn-default btn-xs">Edit</a>
                    </td>
                    <td>
                      <form action="{{ route('users.destroy', [$user]) }}" method="post">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                      <button type="submit" class="btn btn-default btn-xs">Delete</button>
                    </form>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="3">This account currently has no users. <a href="{{ route('users.create') }}">Create one.</a>
                  </tr>
                @endforelse
              </tbody>
            </table>
        </div>
    </div>
</div>
@endsection