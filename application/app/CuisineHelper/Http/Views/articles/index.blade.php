@extends('layouts.app')

@section('title', 'Articles')

@section('head')
@endsection

@section('footer')
	<script type="text/javascript">
		var tags = [];
	</script>
@endsection

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
                        @foreach($articles as $article)
                            <a href="{{$article->url}}" class="image" target="_blank"><img src="{{$article->getImageSourceLink()}}" alt="" /></a>
                            <h3>{{$article->title}}</h3>
                            <p>{{$article->description}}</p>
                            <ul class="actions">
                                <li><a href="{{$article->url}}" class="button" target="_blank">More</a></li>
                                @if (isAdmin())
									<li><a href="{{ route("articles.delete", ['id' => $article->id]) }}" class="button">Delete</a></li>
									<li><a href="{{ route("articles.edit", ['id' => $article->id]) }}" class="button">Edit</a></li>
								@endif
                            </ul>
                        @endforeach
                    </article>
                </div>
            </section>
        </div>
    </div>
    @include('partials.search_article')
@endsection