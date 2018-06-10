@extends('layouts.app')

@section('title', 'Recipes')

@section('head')
@endsection

@php
$logged = 0;
@endphp

@section('content')
	@include('partials.sidemenu')
    <div id="main">
		<div class="inner">
		@if ($has_error)
			{{ $error_message }}
		@endif
			<header id="header">
				<h1 class="title"><strong>Recipes</strong></h1>
				@include('partials.menu')
			</header>

			<section>
				<div class="posts">
					@foreach ($recipes as $recipe)
						<article>
							<a href="{{ route("recipes.show", ['id' => $recipe->id]) }}" class="image"><img src="{{$recipe->getImageSourceLink()}}" alt=""/></a>
							<h3>{{$recipe->title}}</h3>
							<ul class="actions">
								<li><a href="{{ route("recipes.show", ['id' => $recipe->id]) }}" class="button">More</a></li>
								@if ($logged)
									<li><a href="#" class="button">Report</a></li>
									<li><a href="#" class="button">Add to Favorites</a></li>
								@endif
							</ul>
						</article>
					@endforeach
				</div>
			</section>
		</div>
	</div>

    @include('partials.search')
@endsection
