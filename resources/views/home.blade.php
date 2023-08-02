@extends('app')

@section('content')

    <div class="container mt-4">
        <h1 class="main-title">My<span>Games</span>List</h1>
        <div class="welcome-message">
            <h2>Selamat datang di Website MyGamesList</h2>
            <p>Anda dapat menambahkan list games sesuai dengan kemauan Anda, serta menambahkan informasi terkait Developer dari game tersebut. Anda juga dapat melihat game dan developer yang ditambahkan oleh user lain.</p>
        </div>
    </div>

    @guest
        <div class="form-container mb-3">
            <h1>Register</h1>
            <form action="/register" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>

        <div class="login-container">
            <h1>Log In</h1>
            <form action="/login" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="loginName" class="form-label">Name</label>
                    <input type="text" name="loginName" class="form-control" placeholder="Name">
                </div>
                <div class="mb-3">
                    <label for="loginPassword" class="form-label">Password</label>
                    <input type="password" name="loginPassword" class="form-control" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-success">Log In</button>
            </form>
        </div>
    @else
    @endguest
@endsection