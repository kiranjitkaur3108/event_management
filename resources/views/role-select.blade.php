@extends('layouts.app')

@section('title', 'Select Role')

@section('content')
<div class="container text-center my-5">
    <h2 class="mb-4">Select Login Role</h2>
    <a href="{{ url('/login?role=admin') }}" class="btn btn-danger m-2 px-4 py-2">Login as Admin</a>
    <a href="{{ url('/login?role=user') }}" class="btn btn-success m-2 px-4 py-2">Login as User</a>
</div>
@endsection