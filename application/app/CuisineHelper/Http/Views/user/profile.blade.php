@extends('layouts.app')

@section('title', 'Profile')

@section('head')
    <script src="{{ js('main') }}"></script>
@endsection

@section('content')
    @include('partials.sidemenu')
    <div id="main">
        <div class="inner">
            <header id="header">
                <h1 class="title"><strong>My</strong> Profile</h1>
                @include('partials.menu')
            </header>

            <section class="profile_content">
                <h1>Hello, user!</h1>
            
                <strong>23543</strong> <p>users have ❤ your recipes!</p>
                <strong>235434</strong> <p>users have cooked your recipes!</p>
                <strong>23</strong> <p>users have reported your recipes!</p>
            </section>
        </div>
    </div>
@endsection