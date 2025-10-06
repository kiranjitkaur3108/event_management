@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <h2 class="text-center mb-4">Admin Dashboard</h2>

    <p class="lead text-center">Here is the list of registered users:</p>

    <table class="table table-bordered table-hover mt-4">
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
@endsection
