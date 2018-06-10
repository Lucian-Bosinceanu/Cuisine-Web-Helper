@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div id="main">
    <div class="inner login">
        <a href="{{ route("recipes.index") }}">&lt; return to Home</a>

        <header id="header">
            <h1 class="title"><strong>Log</strong>in</h1>
        </header>

        <section>
            <form action="{{ route('auth.login') }}" method="post" id="login-form">
                <label for="username-email-login-input">Username or Email:</label>
                <input type="text" name="username-email" id="username-email-login-input" placeholder="user@site.com" required>

                <label for="password-login-input">Password:</label>
                <input type="password" name="password" id="password-login-input" placeholder="***********" required>

                <!-- <a href="{{ route("recipes.index") }}" class="button">Login</a> -->
                <button type="submit" formmethod="POST" form="login-form">Login</button>
            </form>
        </section>
        @if ($has_error)
            <p style="font-size: 18px; color:#f56a6a;">{{ $error_message }}</p>
        @endif
    </div>
</div>
@endsection
