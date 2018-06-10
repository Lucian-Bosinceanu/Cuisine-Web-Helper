@extends('layouts.app')

@section('title', 'Recipes')

@section('head')
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
                            </ul>
                        @endforeach
                    </article>
                </div>
            </section>
        </div>
    </div>
    @include('partials.search')
@endsection