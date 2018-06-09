@extends('layouts.app')

@section('title', 'Recipes')

@section('head')
    <script src="{{ js('main') }}"></script>
@endsection

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

    @include('partials.search')
@endsection
