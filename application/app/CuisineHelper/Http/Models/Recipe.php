<?php

namespace CuisineHelper\Http\Models;

use \Model;

/**
 * @property int    $id
 * @property string $title
 * @property int $difficulty
 * @property int $time
 * @property string $instructions
 * @property $image
 */
class Recipe extends Model {

    public static $_table = 'recipes';

    public function getIngredients() {
        return $this->has_many_through(MODELPATH . 'Ingredient', MODELPATHMANY . 'IngredientRecipe','recipe_id','ingredient_id','id','id');
    }

    public function getTags() {
        return $this->has_many_through(MODELPATH . 'Tag', MODELPATHMANY . 'RecipeTag','recipe_id','tag_id','id','id');
    }

    public function getUserRatings() {
        return $this->has_many_through(MODELPATH . 'User', MODELPATHMANY . 'Rating','recipe_id','user_id','id','id');
    }
    
    public function getUserReports() {
        return $this->has_many_through(MODELPATH . 'User', MODELPATHMANY . 'Report','recipe_id','user_id','id','id');
    }

    public function getUserMadeRecipes() {
        return $this->has_many_through(MODELPATH . 'User', MODELPATHMANY . 'MadeRecipe','recipe_id','user_id','id','id');
    }

    public function getUserRecipes() {
        return $this->has_many_through(MODELPATH . 'User', MODELPATHMANY . 'MyRecipe','recipe_id','user_id','id','id');
    }

    public function getUserFavouriteRecipes() {
        return $this->has_many_through(MODELPATH . 'User', MODELPATHMANY . 'FavouriteRecipe','recipe_id','user_id','id','id');
    }

    public function getTagNames() {
        $tags = $this->getTags();
        $tagList[] = null;
        foreach ($tags as $tag) 
            array_push($tagList,$tag->name);
        
        return $tagList;
    }

    public function getIngredientNames() {
        $ingredients = $this->getTags();
        $ingredientList[] = null;
        foreach ($ingredients as $ingredient) 
            array_push($ingredientList,$ingredient->name);
        
        return $ingredientList;
    }
}
