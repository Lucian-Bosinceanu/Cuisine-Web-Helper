<?php

namespace CuisineHelper\Http\Controllers;

use CuisineHelper\Library\Http\Controller\BaseController;
use CuisineHelper\Http\Models\Recipe;
use CuisineHelper\Http\Models\User;
use CuisineHelper\Http\Models\Article;
use CuisineHelper\Http\Models\Tag;
use CuisineHelper\Http\Models\ManyToMany\IngredientRecipe;
use CuisineHelper\Http\Models\ManyToMany\RecipeTag;


class RecipeController extends BaseController {

    public function index() {
        $recipes = Recipe::findMany();
        //print_r(css('styles')); exit;

        /*$recipe = Recipe::find_one(1);
        $ingredients = $recipe->getIngredients()->findMany();
        print_r($ingredients);
        exit;*/
        //print_r($articles);
        return view('recipes.index', ['recipes' => $recipes]);
    }

    public function show() {
        return view('recipes.show');
    }

    public function create() {
        return view('recipes.create');
    }

    public function store($request) {
        $params = $request->paramsPost()->all();
        
        $recipeTitle = $params['add'];
        $tagList = explode(' ', $params['tags']);

        $dificulty = null;
        //$dificulty = $params['dificulty'];
        $time = $params['time'];
        $ingredients = $params['ingredients'];

        $uploadedImage = $request->files()->get('image-upload');
        
        $imageTmpName = $uploadedImage['tmp_name'];
        $imageName = $uploadedImage['name'];
        move_uploaded_file($imageTmpName,base_path().'storage/app/img/' . $imageName);
        //$quantities = $params['quantities'];
        $instructions = '';

        foreach ( $params['how-to-steps'] as $insturction )
            $instructions = $instructions . $insturction . '\n';

        $recipe = Recipe::create();
        $recipe->title = $recipeTitle;
        $recipe->dificulty = $dificulty;
        $recipe->time = $time;
        $recipe->instructions = $instructions;
        $recipe->image = base_path().'storage/app/img/' . $imageName;
        //print_r($recipe);
        //$recipe->save();
        //print_r($recipe->save());
        //exit;

        $insertedTags = $this->insertIntoTags($tagList);
        exit;
        insertIntoIngredients($ingredients);
        insertIntoIngredientsRecipes($recipe,$ingredients,$quantities);
        insertIntoRecipeTags($recipe,$tagList);
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

    protected function insertIntoTags($tagList) {
        $insertedTagsList[] = null;
        //print_r($tagList);

        foreach($tagList as $tag){
            $dbTag = Tag::where('name',$tag)->find_one();
            if ($dbTag == null) {
                array_push($insertedTagsList,$dbTag);
                $tagToInsert = Tag::create();
                $tagToInsert->name = $tag;
                $tagToInsert->save();
            }
        }

        return $insertedTagsList;
    }

    private function insertIntoIngredients($ingredients){
        
        foreach($ingredients as $ingredient){
            $dbIngredient = Ingredient::where('name',$ingredient)->find_one();
            if ($dbTag == null) {
                $ingredientToInsert = Ingredient::create();
                $ingredientToInsert->name = $ingredient;
                $ingredientToInsert->save();
            }
        }

    }

    private function insertIntoIngredientsRecipes($recipe,$ingredients,$quantities){

    }

    private function insertIntoRecipeTags($recipe,$insertedTags){

    }
}
