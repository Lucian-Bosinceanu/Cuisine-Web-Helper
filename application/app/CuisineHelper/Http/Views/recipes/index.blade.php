@extends('layouts.app')

@section('title', 'Recipes')

@section('head')
@endsection

@php
$logged = 0;
$recipes = [];
@endphp

@section('content')
	@include('partials.sidemenu')
    <div id="main">
		<div class="inner">
			<header id="header">
				<h1 class="title"><strong>Recipes</strong></h1>
				@include('partials.menu')
			</header>

			<section>
				<div class="posts">
					<article>
						<a href="{{ route("recipes.show") }}" class="image"><img src="http://goodtoknow.media.ipcdigital.co.uk/111/000016ef4/c0e9/Butter-chicken-recipe.jpg" alt=""/></a>
						<h3>Food 1</h3>
						<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
						<ul class="actions">
							<li><a href="{{ route("recipes.show") }}" class="button">More</a></li>
							@if ($logged)
								<li><a href="#" class="button">Report</a></li>
								<li><a href="#" class="button">Add to Favorites</a></li>
							@endif
						</ul>
					</article>
					<article>
						<a href="pages/recipe.html" class="image"><img src="https://www.campbellsoup.co.uk/img/recipes/6-campbells-vegetarian-pizza-recipe.jpg" alt=""/></a>
						<h3>Pizza</h3>
						<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
						<ul class="actions">
							<li><a href="pages/recipe.html" class="button">More</a></li>
						</ul>
					</article>
				</div>
			</section>
		</div>
	</div>

    @include('partials.search')
@endsection
