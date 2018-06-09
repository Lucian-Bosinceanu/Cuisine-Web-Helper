@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div id="main">
        <div class="inner login">
            <a href="{{ route("recipes.index") }}">&lt; return to Home</a>

            <header id="header">
                <h1 class="title"><strong>Register</strong></h1>
            </header>

            <section>
                <form action="{{ route('auth.register') }}" method="POST" id="register-form">
                    <label for="username_create_input">Username:</label>
                    <input type="text" name="username" id="username_create_input" placeholder="username" required>
            
                    <label for="password_create_input">Password:</label>
                    <input type="password" name="password" id="password_create_input" placeholder="********" required>
            
                    <label for="email_create_input">Email:</label>
                    <input type="email" name="email" id="email_create_input" placeholder="user@site.com" required>
            
                    <!-- <a href="../logged-index.html" class="button" type="submit">Register</a> -->
                    <button type="submit" formmethod="POST" form="register-form">Register</button>
                </form>
            </section>
        </div>
    </div>
@endsection
