@extends('layouts.app')


@section('title', 'Login | Celebrations')


@section('content')
<style>
    /* === Page Background === */
    body {
        background-color: #f4e9dd;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }


    /* === Login Container === */
    .login-container {
        padding: 60px 20px;
        min-height: 80vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }


    /* === Card Styling === */
    .login-card {
        max-width: 500px;
        width: 100%;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        padding: 35px;
        text-align: center;
    }


    .login-card h2 {
        color: #ae674e;
        font-weight: bold;
        margin-bottom: 25px;
    }


    .login-card label {
        font-weight: 600;
        color: #ae674e;
        text-align: left;
        display: block;
        margin-bottom: 6px;
    }


    .login-card .form-control {
        margin-bottom: 15px;
        padding: 10px;
        border-radius: 6px;
        border: 1px solid #d8c1b4;
        transition: border-color 0.2s ease-in-out, box-shadow 0.2s;
        width: 100%;
    }


    .login-card .form-control:focus {
        border-color: #ae674e;
        box-shadow: 0 0 5px rgba(174, 103, 78, 0.4);
    }


    .login-card .btn-uniform {
        background-color: #ae674e;
        color: #fff;
        border: none;
        border-radius: 6px;
        padding: 12px;
        font-weight: bold;
        cursor: pointer;
        transition: background 0.3s ease;
        display: block;
        width: 100%;
        margin: 10px 0;
        text-decoration: none;
        text-align: center;
    }


    .login-card .btn-uniform:hover {
        background-color: #8f523d;
        color: #fff;
    }


    /* Dropdown alignment */
    .login-card select.form-control {
        padding: 10px;
    }


    @media (max-width: 576px) {
        .login-card {
            padding: 25px;
        }
    }
</style>


<div class="login-container">
    <div class="login-card">
        <h2>Login</h2>


        @if(session('error'))
            <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
        @endif


        @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif


        <form method="POST" action="{{ route('login.submit') }}">
            @csrf


            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
            </div>


            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
            </div>


            <div class="mb-3">
                <label>Login As</label>
                <select name="role" class="form-control" required>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>


            <button type="submit" class="btn-uniform">Login</button>
        </form>


        <a href="{{ route('register') }}" class="btn-uniform">Register here</a>
    </div>
</div>
@endsection