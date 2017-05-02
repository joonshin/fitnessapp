@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($movements as $movement)
            <a href="/movements/{{$movement->id}}">{{$movement->name}}</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/movements/{{$movement->id}}/edit" class="btn btn-default btn-xs">Edit</a> <br>
        @endforeach
    </div>
    <div class="row">
    	<a href="/movements/create" class="btn btn-primary">Create Movement</a>
    </div>
</div>
@endsection