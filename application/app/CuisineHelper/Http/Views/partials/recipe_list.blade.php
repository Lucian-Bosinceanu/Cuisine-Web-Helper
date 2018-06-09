<section>
    <div class="posts">
        @foreach($recipes as $recipe)
            @include('partials.recipe', [
                "type" => $type,
                "id" => $recipe->id,
                "image" => $recipe->image,
                "title" => $recipe->title,
                "description" => $recipe->description,
                "btnNr" => $btnNr,
                "btn1" => $btn1,
                "btn2" => $btn2,
                "btn3" => $btn3
            ])
        @endforeach
    </div>
    <!-- @include('partials.recipe_list', [
        "recipes" => $recipes,
        "type" => "all",
        "btnNr" => 2,
        "btn1" => ["route("recipes.show")", "More"],
        "btn2" => ["#", "Add to Favorites"],
        "btn3" => ["", ""],
    ]) -->
</section>