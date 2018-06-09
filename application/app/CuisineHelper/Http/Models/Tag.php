<?php

namespace CuisineHelper\Http\Models;

use \Model;

/**
 * @property int    $id
 * @property string $name
 */
class Tag extends Model {

    public static $_table = 'tags';

    public function getRecipes() {
        return $this->has_many_through(MODELPATH . 'Recipe', MODELPATHMANY . 'RecipeTag','tag_id','recipe_id','id','id');
    }

    public function getUserWithFoodRestriction() {
        return $this->has_many_through(MODELPATH . 'User', MODELPATHMANY . 'FoodRestriction','tag_id', 'user_id','id','id');
    }
    
    public function getUserWithFoodLifestyle() {
        return $this->has_many_through(MODELPATH . 'User', MODELPATHMANY . 'FoodLifestyle','tag_id', 'user_id','id','id');
    }
}
