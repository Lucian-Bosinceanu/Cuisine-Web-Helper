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
        <li><a href="user_profile/my_recipes.html">My recipes</a></li>
        <li><a href="user_profile/favourites_recipes.html">My favorites</a></li>
        <li><a href="user_profile/made_recipes.html">Made recipes</a></li>
        <li><a href="user_profile/profile.html">Profile</a></li>
        <li><a href="user_profile/account.html">Account</a></li>
    @endif
</ul>