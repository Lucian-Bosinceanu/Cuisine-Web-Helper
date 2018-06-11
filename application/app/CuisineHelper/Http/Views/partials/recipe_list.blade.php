<section>
    <div class="posts">        
        @foreach ($recipes as $recipe)
            <article>
                <a href="{{ route("recipes.show", ['id' => $recipe->id]) }}" class="image"><img src="{{$recipe->getImageSourceLink()}}" alt=""/></a>
                <h3>{{$recipe->title}}</h3>
                <ul class="actions">
                    <li><a href="{{ route("recipes.show", ['id' => $recipe->id]) }}" class="button">More</a></li>
                    @if (isAdmin())
                        <li><a href="{{ route("recipes.delete", ['id' => $recipe->id]) }}" class="button">Delete</a></li>
                        <li><a href="{{ route("recipes.edit", ['id' => $recipe->id]) }}" class="button">Edit</a></li>
                    @endif
                </ul>
            </article>
        @endforeach
    </div>
</section>
