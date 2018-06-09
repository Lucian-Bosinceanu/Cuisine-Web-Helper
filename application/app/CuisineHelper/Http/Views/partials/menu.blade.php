@php
$logged = 0;
@endphp
<ul class="login">
    <li><a href="{{ route("recipes.index") }}">Home</a></li>
    <li><a href="{{ route("articles.index") }}">Articles</a></li>
    @if (!$logged)
        <li><a href="{{ route("auth.register") }}">Register</a></li>
        <li><a href="{{ route("auth.login") }}">Login</a></li>
    @else
        <li><a href="#">My recipes</a></li>
        <li><a href="#">My favorites</a></li>
        <li><a href="#">Made recipes</a></li>
        <li><a href="{{ route("user.profile") }}">Profile</a></li>
        <li><a href="{{ route("user.account") }}">Account</a></li>
    @endif
</ul>