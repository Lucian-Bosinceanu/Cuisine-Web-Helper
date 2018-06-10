<?php

namespace CuisineHelper\Http\Controllers;

use CuisineHelper\Library\Http\Controller\BaseController;
use CuisineHelper\Http\Models\Recipe;
use CuisineHelper\Http\Models\Tag;
use CuisineHelper\Http\Models\Ingredient;
use CuisineHelper\Http\Models\ManyToMany\IngredientRecipe;
use CuisineHelper\Http\Models\ManyToMany\RecipeTag;
use CuisineHelper\Http\Models\Auth;

class RecipeController extends BaseController {

    public function index($request) {
        $recipes = Recipe::findMany();
        //print_r($request->cookies());
        return view('recipes.index', ['recipes' => $recipes]);  
    }

    public function show($request) {
<<<<<<< HEAD
        //print_r($request->cookies());
        $difficulties= array(0, "Very Easy", "Easy", "Medium", "Hard", "Very Hard"); 
=======
>>>>>>> 3cc2b419ae0e0813a85412ad67c10faaeecaa8d0
        $recipeId = $request->paramsNamed()->get('id');

        $recipe = Recipe::findOne($recipeId);
        
        $tags = $recipe->getTagNames();    
        $ingredients = $recipe->getIngredientNames();        
        $instructions = $recipe->getInstructionList();
        $difficulty = $difficulties[$recipe->dificulty];

        //print_r($ingredients->findMany());
        //exit;

        return view('recipes.show', [ 'recipe' => $recipe, 'tags' => $tags, 'ingredients' => $ingredients, 'instructions' => $instructions, 'difficulty' => $difficulty]);
    }

    public function create() {
        return view('recipes.create');
    }

    public function store($request) {
        $params = $request->paramsPost()->all();

        $tagList = explode(' ', $params['tags']);
        $ingredients = $params['ingredients'];
        $quantities = $params['quantity'];

        $createdRecipe = $this->insertIntoRecipes(Recipe::create(),$request);
        if ($createdRecipe == null)
            exit;

        $this->insertIntoTags($tagList);
        $this->insertIntoIngredients($ingredients);


        $this->insertIntoIngredientsRecipes($createdRecipe,$ingredients,$quantities);
        $this->insertIntoRecipeTags($createdRecipe,$tagList);
    }

    public function edit() {
        return view('recipes.edit');
    }

    public function update($request) {
        $params = $request->paramsPost()->all();
        $recipeId = $request->paramsNamed()->get('id');
        $recipe = Recipe::find_one($recipeId);

        $oldTags = $recipe->getTags();
        $newTags = explode(' ', $params['tags']);

        $oldIngredients = $recipe->getIngredients();
        $newIngredients = $params['ingredients'];

        $quantities = $params['quantity'];


        $ingredientsToInsert = array_diff($newIngredients,$oldIngredients);
        $quantitiesToInsert = null;

        foreach ($ingredientsToInsert as $ingredient) {
            $position = array_search($ingredient,$newIngredients);
            array_push($quantitiesToInsert, $quantities[$position]);
        }

        $this->insertIntoRecipes($recipe,$request);

        $this->insertIntoRecipeTags($recipe,array_diff($newTags,$oldTags));
        $this->insertIntoIngredientsRecipes($recipe,$ingredientsToInsert,$quantitiesToInsert);

        $this->deleteFromRecipeTags($recipe,array_dif($oldTags,$newTags));
        $this->deleteFromIngredientsRecipes($recipe,array_diff($oldIngredients,$newIngredients));
    }

    public function delete($request) {
        $params = $request->paramsPost()->all();
        $recipeId = $params['id'];
        $recipe = Recipe::find_one($recipeId);
        unlink($recipe->image);
        $recipe->delete();
    }

    
    private function insertIntoRecipes($recipe, $request) {
        $params = $request->paramsPost()->all();
        
        unlink($recipe->image);

        $recipeTitle = $params['add'];
        $dificulty = $params['difficulty'];
        $time = $params['time'];

        $uploadedImage = $request->files()->get('image-upload');
        $imageTmpName = $uploadedImage['tmp_name'];
        $imageName = $uploadedImage['name'];
        $imagePath = /*base_path() .*/ '../storage/app/img/' . time() . '_' . random_int(1,100000) . '_'. $imageName ;

        $instructions = '';

        $step = 1;
        foreach ( $params['how-to-steps'] as $instruction )
            $instructions = $instructions .  $instruction . '##';

        $anotherSameRecipe = Recipe::where(['title' => $recipeTitle, 'dificulty' => $dificulty, 'time' => $time,
                                            'instructions' => $instructions ])->findOne();
        if ($anotherSameRecipe)
            return null;

        move_uploaded_file($imageTmpName,$imagePath);
        $recipe->title = $recipeTitle;
        $recipe->dificulty = $dificulty;
        $recipe->time = $time;
        $recipe->instructions = $instructions;
        $recipe->image = $imagePath;
        
        $recipe->save();

        return $recipe;
    }

    private function deleteFromRecipeTags($recipe,$tags){
        $recipeId = $recipe->id;
        
        foreach ($tags as $tag) {
            $tagDB = Tag::where('name',$tag)->findOne();
            $tagId = $tagDB->id;
            RecipeTag::where(['recipe_id' => $recipeId, 'tag_id' => $tagId])->delete();
        }
    }

    private function deleteFromIngredientsRecipes($recipe,$ingredients){
        $recipeId = $recipe->id;
        
        foreach ($ingredients as $ingredient) {
            $ingredientDB = Ingredient::where('name',$ingredient)->findOne();
            $ingredientId = $ingredientDB->id;
            RecipeTag::where(['recipe_id' => $recipeId, 'ingredient_id' => $ingredientId])->delete();
        }
    }

    private function insertIntoTags($tagList) {

        foreach($tagList as $tag){
            $dbTag = Tag::where('name',$tag)->find_one();
            if ($dbTag == null) {
                $tagToInsert = Tag::create();
                $tagToInsert->name = $tag;
                $tagToInsert->save();
            }
        }
    }

    private function insertIntoIngredients($ingredients){
        
        foreach($ingredients as $ingredient){
            $dbIngredient = Ingredient::where('name',$ingredient)->find_one();
            if ($dbIngredient == null) {
                $ingredientToInsert = Ingredient::create();
                $ingredientToInsert->name = $ingredient;
                $ingredientToInsert->save();
            }
        }

    }

    private function insertIntoIngredientsRecipes($recipe,$ingredients,$quantities){
        $recipeId = $recipe->id;
        for ($i = 0; $i < count($ingredients); $i++) {
            $ingredientRecipe = IngredientRecipe::create();
            $ingredientRecipe->ingredient_id = Ingredient::where('name',$ingredients[$i])->find_one()->id;
            $ingredientRecipe->recipe_id = $recipeId;
            $ingredientRecipe->quantity = $quantities[$i];
            $ingredientRecipe->save();
        }
    }

    private function insertIntoRecipeTags($recipe,$insertedTags){
        
        $recipeId = $recipe->id;
        
        for ($i = 0; $i < count($insertedTags); $i++) {
            $recipeTag = RecipeTag::create();
            $recipeTag->tag_id = Tag::where('name',$insertedTags[$i])->find_one()->id;
            $recipeTag->recipe_id = $recipeId;
            $recipeTag->save();
        }
    }
}
