@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            {{$user->name}} <br>
            {{$user->email}}
    </div>
</div>
@endsection
