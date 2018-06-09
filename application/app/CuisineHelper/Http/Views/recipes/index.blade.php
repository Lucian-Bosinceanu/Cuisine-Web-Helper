@extends('layouts.app')

@section('title', 'Recipes')

@section('head')
    <script src="{{ js('main') }}"></script>
@endsection

@section('content')
	@php
	$index = 1;
	@endphp
	<div>
		<h3>THIS IS A TEST, TEMPORARY</h3>
		@foreach($recipes as $recipe)
			<h5>Recipe Title #{{ $index++ }}: {{$recipe->title}}</h5>
		@endforeach
	</div>

    <div id="main">
			<div class="inner">
				<header id="header">
					<h1 class="title"><strong>Featured</strong> recipes</h1>
					<ul class="login">
						<li><a href="index.html">Home</a></li>
						<li><a href="pages/articles.html">Articles</a></li>
						<li><a href="pages/register.html">Register</a></li>
						<li><a href="pages/login.html">Login</a></li>
					</ul>
				</header>

				<section>
					<div class="posts">
						<article>
							<a href="pages/recipe.html" class="image"><img src="http://goodtoknow.media.ipcdigital.co.uk/111/000016ef4/c0e9/Butter-chicken-recipe.jpg" alt=""/></a>
							<h3>Food 1</h3>
							<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
							<ul class="actions">
								<li><a href="pages/recipe.html" class="button">More</a></li>
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
						<article>
							<a href="pages/recipe.html" class="image"><img
                                        src="https://food.fnr.sndimg.com/content/dam/images/food/fullset/2012/2/29/0/0149359_Making-Taco_s4x3.jpg.rend.hgtvcom.616.462.suffix/1371603491866.jpeg"
                                        alt=""/></a>
							<h3>Tempus ullamcorper</h3>
							<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
							<ul class="actions">
								<li><a href="pages/recipe.html" class="button">More</a></li>
							</ul>
						</article>
						<article>
							<a href="pages/recipe.html" class="image"><img src="https://www.seriouseats.com/recipes/images/2016/01/20160206-fried-rice-food-lab-68-1500x1125.jpg"
                                                                           alt=""/></a>
							<h3>Sed etiam facilis</h3>
							<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
							<ul class="actions">
								<li><a href="pages/recipe.html" class="button">More</a></li>
							</ul>
						</article>
					</div>
				</section>
			</div>
		</div>

    <div id="sidebar">
			<button id="search-button" onclick="toggleSidebar()">Search</button>

			<div class="inner">

				<section class="search">
					<header class="subtitle">
						<h2>Search by title</h2>
					</header>

					<form method="post" action="#">
						<input type="text" name="recipe-search" id="recipe-search" placeholder="e.g. pizza"/>
					</form>
				</section>

				<nav id="menu" class="search">
					<header class="subtitle">
						<h2>Search by tags</h2>
					</header>

					<form method="post" action="#">
						<input type="text" name="tag-search" id="tag-search" placeholder="e.g. salami"/>
					</form>

					<ul>
						<li>
							<input type="checkbox" id="pineapple" name="pineapple" checked>
							<label for="pineapple">Pineapple</label>
						</li>
						<li>
							<input type="checkbox" id="salami" name="salami" checked>
							<label for="salami">Salami</label>
						</li>
						<li>
							<input type="checkbox" id="potatoes" name="potatoes" checked>
							<label for="potatoes">Potaotes</label>
						</li>
						<li>
							<span id="opener1" class="opener" onclick="toggleDropdown('opener1')">Lifestyle</span>
							<ul>
								<li>
									<input type="checkbox" id="vegetarian" name="vegetarian">
									<label for="vegetarian">Vegetarian</label>
								</li>
								<li>
									<input type="checkbox" id="vegan" name="vegan">
									<label for="vegan">Vegan</label>
								</li>
								<li>
									<input type="checkbox" id="omnivorus" name="omnivorus">
									<label for="omnivorus">Omnivorus</label>
								</li>
							</ul>
						</li>
						<li>
							<span id="opener2" class="opener" onclick="toggleDropdown('opener2')">Required time</span>
							<ul>
								<li>
									<input type="checkbox" id="less-then-60-min" name="less-then-60-min">
									<label for="less-then-60-min">&lt; 60 min</label>
								</li>
							</ul>
						</li>
					</ul>
				</nav>

				<section class="search" class="alt">
					<header class="subtitle">
						<h2>Search article</h2>
					</header>

					<form method="post" action="#">
						<input type="text" name="recipe-search" id="article-search" placeholder="e.g. 5 ways to.."/>
					</form>
				</section>
			</div>
		</div>
@endsection
