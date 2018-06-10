@extends('layouts.app')

@section('title', 'Articles')

@section('head')
@endsection

@php
$logged = 0;
@endphp

@section('content')
	@include('partials.sidemenu')
    <div id="main">
        <div class="inner">
            <header id="header">
                <h1 class="title"><strong>Articles</strong></h1>
                @include('partials.menu')
            </header>

            <section>
                <div class="posts">
                    <article>
                        <a href="https://www.retete-gustoase.ro" class="image" target="_blank"><img src="http://goodtoknow.media.ipcdigital.co.uk/111/000016ef4/c0e9/Butter-chicken-recipe.jpg" alt="" /></a>
                        <h3>Featured article title 1</h3>
                        <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
                        <ul class="actions">
                            <li><a href="https://www.retete-gustoase.ro" class="button" target="_blank">More</a></li>
                            @if ($logged) 
                                <li><a href="#" class="button">Edit</a></li>
								<li><a href="#" class="button">Delete</a></li>
							@endif
                        </ul>
                    </article>
                    <article>
                        <a href="https://www.retete-gustoase.ro" class="image" target="_blank"><img src="https://www.campbellsoup.co.uk/img/recipes/6-campbells-vegetarian-pizza-recipe.jpg" alt="" /></a>
                        <h3>Featured article title 2</h3>
                        <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
                        <ul class="actions">
                            <li><a href="https://www.retete-gustoase.ro" class="button" target="_blank">More</a></li>
                            @if ($logged) 
                                <li><a href="#" class="button">Edit</a></li>
								<li><a href="#" class="button">Delete</a></li>
							@endif
                        </ul>
                    </article>
                </div>
            </section>
        </div>
    </div>
    @include('partials.search')
@endsection