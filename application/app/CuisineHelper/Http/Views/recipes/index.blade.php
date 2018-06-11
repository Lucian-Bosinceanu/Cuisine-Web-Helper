@extends('layouts.app')

@section('title', 'Recipes')

@section('head')
    <script src="{{ js('index') }}"></script>
    <script src="{{ js('search') }}"></script>
@endsection

@section('footer')
	<script type="text/javascript">
		var tags = {!! $tags !!};
		var searchRecipeTitleUrl = "{{ $ajaxUrls['searchRecipe'] }}";
		var exportRssUrl = "{{ $ajaxUrls['exportRss'] }}";
	</script>
@endsection

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

			@include('partials.recipe_list', ['recipes' => $recipes])
		</div>
	</div>

    @include('partials.search', ['tags' => $tags])
@endsection
