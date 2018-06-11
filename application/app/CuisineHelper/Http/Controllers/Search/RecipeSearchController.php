<?php

namespace CuisineHelper\Http\Controllers\Search;

use CuisineHelper\Library\Http\Controller\BaseController;
use CuisineHelper\Http\Models\Recipe;
use CuisineHelper\Http\Models\Tag;

class RecipeSearchController extends BaseController {
    public function searchTitle($request) {
        $title = $request->paramsPost()->get('title');
        $recipes = Recipe::searchByTitle($title);
        $recipes = $recipes == null ? [] : $recipes;
        $tags = Tag::findArray();
        $index = 0;
        $tags = array_map(function ($tag) use (&$index) {
            return ["id" => $index++,
                    "text" => $tag['name']];
        }, $tags);
        return view('partials.recipe_list', ['recipes' => $recipes]);
    }
}