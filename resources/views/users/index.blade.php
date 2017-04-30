@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($users as $user)
            <a href="/users/{{$user->id}}">{{$user->name}}</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/users/{{$user->id}}/edit" class="btn btn-default btn-xs">Edit</a> <br>
        @endforeach
    </div>
    <div class="row">
    	<a href="/users/create" class="btn btn-primary">Create User</a>
    </div>
</div>
@endsection
