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

        $user = User::find_one(0);
        $articles = $user->getArticles()->findMany();
        print_r($articles);
        exit;
        //$article = Article::where('id', 1)->findOne();
        //print_r($article->title);
        //exit;
        //print_r($articles = $user->getArticles());
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
