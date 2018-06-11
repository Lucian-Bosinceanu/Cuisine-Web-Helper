<?php

namespace CuisineHelper\Http\Controllers\Search;

use CuisineHelper\Library\Http\Controller\BaseController;
use CuisineHelper\Http\Models\Recipe;
use CuisineHelper\Http\Models\Tag;

class RecipeSearchController extends BaseController {
    protected $reqParams = ['title', 'tags', 'form', 'restrictions'];

    public function searchTitle($request) {
        $params = $this->getSearchParams($request->paramsPost());
        return json_encode($recipes = Recipe::searchRecipes($params));
        
        $tags = $params['tags'];
        return json_encode($params);
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

    private function getSearchParams($postParams) {
        $result = [];
        $params = $postParams;
        foreach ($this->reqParams as $key) {
            $result[$key] = $params->get($key);
        }
        return $result;
    }
}