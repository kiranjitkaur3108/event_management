@extends('layouts.app')
@section('title','Manage Users')
@section('content')
<div class="container">
    <h2>Manage Users</h2>
    <p class="text-muted">User list will appear here. For now this is a placeholder so you can see the admin flow.</p>
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
        <tr>
            <th>#</th><th>Name</th><th>Email</th><th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td><td>Jane Doe</td><td>jane@example.com</td>
            <td>
                <button class="btn btn-sm btn-primary">Edit</button>
                <button class="btn btn-sm btn-danger">Delete</button>
            </td>
        </tr>
        <tr>
            <td>2</td><td>John Smith</td><td>john@example.com</td>
            <td>
                <button class="btn btn-sm btn-primary">Edit</button>
                <button class="btn btn-sm btn-danger">Delete</button>
            </td>
        </tr>
        </tbody>
    </table>
</div>
@endsection
