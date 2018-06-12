<?php

namespace CuisineHelper\Http\Controllers\Search;

use CuisineHelper\Library\Http\Controller\BaseController;
use CuisineHelper\Http\Models\Recipe;
use CuisineHelper\Http\Models\Tag;

class RecipeSearchController extends BaseController {
    protected $reqParams = ['title', 'tags', 'form', 'restrictions'];

    public function search($request) {
        $params = $this->getSearchParams($request->paramsPost());
        $recipes = Recipe::searchRecipes($params);
        
        return view('partials.recipe_list', ['recipes' => Recipe::createFromArrayList($recipes)]);
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