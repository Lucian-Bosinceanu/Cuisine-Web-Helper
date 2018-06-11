@extends('layouts.app')

@section('title', 'Articles')

@section('head')
@endsection

@section('footer')
	<script type="text/javascript">
        var tags = [];
        var searchArticleTitleUrl = "{{ $ajaxUrls['searchArticle'] }}";
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

			@include('partials.article_list', ['articles' => $articles])
        </div>
    </div>
    @include('partials.search_article')
@endsection