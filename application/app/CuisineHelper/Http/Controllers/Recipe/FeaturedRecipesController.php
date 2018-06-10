<?php

namespace CuisineHelper\Http\Controllers\Recipe;

use CuisineHelper\Library\Http\Controller\BaseController;

class FeaturedRecipesController extends BaseController {

    public function show() {
        return view('recipe');
    }

}
