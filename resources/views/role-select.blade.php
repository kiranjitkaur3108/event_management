@extends('layouts.app')

@section('title', 'Select Role | Celebrations')

@section('content')
    <style>

        .role-select-section {
            background-color: #f4e9dd;
            padding: 60px 20px;
            border-radius: 10px;
            margin: 50px auto;
            max-width: 900px;
            display: flex;
            flex-wrap: wrap;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
            background-color: #fffaf6;
        }

        .role-select-left {
            flex: 1 1 40%;
            padding: 30px;
            color: #fff;
            background: #ae674e;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            border-radius: 10px 0 0 10px;
        }

        .role-select-left h1 {
            font-family: 'Pacifico', cursive;
            font-size: 36px;
            margin-bottom: 15px;
        }

        .role-select-left p {
            font-size: 16px;
            color: #fffaf6;
        }

        .role-select-right {
            flex: 1 1 60%;
            padding: 40px;
            background: transparent;
            text-align: center;
        }

        .role-select-right h2 {
            color: #ae674e;
            margin-bottom: 30px;
            font-weight: 600;
        }

        .role-buttons {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .role-button {
            background-color: #ae674e;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 14px 35px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 3px 6px rgba(0,0,0,0.1);
        }

        .role-button:hover {
            background-color: #914c34;
            transform: translateY(-3px);
        }

        .back-link {
            display: block;
            margin-top: 25px;
            color: #ae674e;
            font-weight: bold;
            text-decoration: underline;
        }

        .back-link:hover {
            color: #914c34;
        }
    </style>

    <div class="role-select-section">
        <div class="role-select-left">
            <h1><i class="fa-solid fa-user-shield"></i> Celebrations</h1>
            <p>Choose your login role to continue.</p>
        </div>

        <div class="role-select-right">
            <h2>Select Login Role</h2>

            <div class="role-buttons">
                <a href="{{ url('/login?role=admin') }}" class="role-button">Login as Admin</a>
                <a href="{{ url('/login?role=user') }}" class="role-button">Login as User</a>
            </div>

            <a href="{{ url('/') }}" class="back-link">← Back to Home</a>
        </div>
    </div>
@endsection
