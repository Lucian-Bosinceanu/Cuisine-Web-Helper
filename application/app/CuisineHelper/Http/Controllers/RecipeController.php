<?php

namespace CuisineHelper\Http\Controllers;

use CuisineHelper\Library\Http\Controller\BaseController;
use CuisineHelper\Http\Models\Recipe;
use CuisineHelper\Http\Models\User;
use CuisineHelper\Http\Models\Article;

class RecipeController extends BaseController {

    public function index() {
        $recipes = Recipe::findMany();
        //print_r(css('styles')); exit;

        $recipe = Recipe::find_one(1);
        $ingredients = $recipe->getIngredients()->findMany();
        print_r($ingredients);
        exit;
        //print_r($articles);
        return view('recipes.index', ['recipes' => $recipes]);
    }

    public function show() {
        return view('recipes.show');
    }

    public function create() {
        return view('recipes.create');
    }

    public function store() {
        
    }

    public function edit() {
        return view('recipes.edit');
    }

    public function update() {
        //TO DO
    }

    public function delete() {
        //TO DO
    }
}
