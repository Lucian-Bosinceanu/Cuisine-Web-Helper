@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="inner login">
    <a href="../index.html">&lt; return to Home</a>

    <header id="header">
        <h1 class="title"><strong>Log</strong>in</h1>
    </header>

    <section id="login_form">
        <form action="#" method="post">
            <label for="username_email_login_input">Username or Email:</label>
            <input type="text" name="username_email" id="username_email_login_input" placeholder="user@site.com" required>

            <label for="password_login_input">Password:</label>
            <input type="password" name="password" id="password_login_input" placeholder="***********" required>

            <a href="../logged-index.html" class="button">Login</a>
        </form>
    </section>
</div>
@endsection
