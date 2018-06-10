<?php

namespace CuisineHelper\Http\Models;

use CuisineHelper\Http\Models\ManyToMany\IngredientRecipe;
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
        $tags = $this->getTags()->findMany();
        $tagList[] = null;
        
        foreach ($tags as $tag) 
                array_push($tagList,$tag->name);
        array_shift($tagList);
        return $tagList;
    }

    public function getIngredientNames() {
        $ingredients = $this->getIngredients()->findMany();
        $ingredientList[] = null;
        foreach ($ingredients as $ingredient) 
            {
                $ingredientQuantity = IngredientRecipe::where(['recipe_id' => $this->id,'ingredient_id' => $ingredient->id])->findOne()->quantity;
                array_push($ingredientList,$ingredientQuantity . ' ' . $ingredient->name);
            }    
        return $ingredientList;
    }

    public function getInstructionList() {
        $instructions = explode('##', $this->instructions);
        array_pop($instructions);
        return $instructions;
    }

    public function getImageSourceLink() {
        $imgUrl = base64_encode(file_get_contents($this->image));
        $type = pathinfo($imgUrl, PATHINFO_EXTENSION);
        $imageSrc = "data:image/" . $type . " ;base64," . $imgUrl;
        return $imageSrc;
    }
    
}
