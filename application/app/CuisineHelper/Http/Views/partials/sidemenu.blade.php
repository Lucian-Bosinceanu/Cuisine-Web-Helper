<div id="sidebar-menu">
    <button id="menu-button">Menu</button>
    <div class="inner">
        <ul class="sidebar-login">
            <li><a href="{{ route("recipes.index") }}">Home</a></li>
            <li><a href="{{ route("articles.index") }}">Articles</a></li>
            @if (!isAuth())
                <li><a href="{{ route("auth.register") }}">Register</a></li>
                <li><a href="{{ route("auth.login") }}">Login</a></li>
            @else
                <li><a href="{{ route("user.account") }}">Account</a></li>
                <li><a href="{{ route("auth.logout") }}">Logout</a></li>
            @endif
        </ul>
    </div>
</div>