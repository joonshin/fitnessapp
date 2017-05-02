@extends('layouts.app')

@section('title', 'Movement Index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h2>Movements</h2>
          <div class="row">
            <a href="{{ route('movements.create')}}" class="btn btn-default pull-right">Create New Movement</a>
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
                @forelse ($movements as $movement)
                  <tr>
                    <td>{{ $movement->id }}</td>
                    <td><a href="{{ route('movements.show', [$movement]) }}">{{ $movement->name }}</a></td>
                    <td>
                      <a href="{{ route('movements.edit', [$movement]) }}" class="btn btn-default btn-xs">Edit</a>
                    </td>
                    <td>
                      <form action="{{ route('movements.destroy', [$movement]) }}" method="post">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                      <button type="submit" class="btn btn-default btn-xs">Delete</button>
                    </form>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="3">This account currently has no movements. <a href="{{ route('movements.create') }}">Create one.</a>
                  </tr>
                @endforelse
              </tbody>
            </table>
        </div>
    </div>
</div>
@endsection