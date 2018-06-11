<section>
    <div class="posts">        
        @foreach ($recipes as $recipe)
            <article data-id="{{ $recipe->id }}">
                <a href="{{ route("recipes.show", ['id' => $recipe->id]) }}" class="image"><img src="{{$recipe->getImagePath()}}" alt=""/></a>
                <h3>{{$recipe->title}}</h3>
                <ul class="actions">
                    <li><a href="{{ route("recipes.show", ['id' => $recipe->id]) }}" class="button">More</a></li>
                    @if (isAdmin())
                        <li><a href="{{ route("recipes.delete", ['id' => $recipe->id]) }}" class="button delete-article-button" data-id="{{ $recipe->id }}">Delete</a></li>
                        <li><a href="{{ route("recipes.edit", ['id' => $recipe->id]) }}" class="button">Edit</a></li>
                    @endif
                </ul>
            </article>
        @endforeach
    </div>
</section>
