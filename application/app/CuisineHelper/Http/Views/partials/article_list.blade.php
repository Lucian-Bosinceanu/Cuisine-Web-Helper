<section>
    <div class="posts">
        @foreach($articles as $article)
            <article data-id="{{ $article->id }}">
                <a href="{{$article->url}}" class="image" target="_blank"><img src="{{$article->getImageSourceLink()}}" alt="" /></a>
                <h3>{{$article->title}}</h3>
                <p>{{$article->description}}</p>
                <ul class="actions">
                    <li><a href="{{ $article->url }}" class="button" target="_blank">More</a></li>
                    @if (isAdmin())
                        <li><a href="{{ route("articles.delete", ['id' => $article->id]) }}" class="button delete-article-button" data-id="{{ $article->id }}">Delete</a></li>
                        <li><a href="{{ route("articles.edit", ['id' => $article->id]) }}" class="button">Edit</a></li>
                    @endif
                </ul>
            </article>
        @endforeach
    </div>
</section>