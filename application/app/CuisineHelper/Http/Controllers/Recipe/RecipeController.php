<?php

namespace CuisineHelper\Http\Controllers\Recipe;

use CuisineHelper\Library\Http\Controller\BaseController;

class RecipeController extends BaseController {

    public function index() {

    }

    public function show() {
        return view('recipe');
    }

    public function create() {
        return view('addRecipe');
    }

    public function store() {
        
    }

    public function edit() {
        return view('editRecipe');
    }

    public function update() {
        //TO DO
    }

    public function delete() {
        //TO DO
    }
}
