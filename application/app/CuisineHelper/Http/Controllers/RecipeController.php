<?php

namespace CuisineHelper\Http\Controllers;

use CuisineHelper\Library\Http\Controller\BaseController;
use CuisineHelper\Http\Models\Recipe;

class RecipeController extends BaseController {

    public function index() {
        $recipes = Recipe::findMany();
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
