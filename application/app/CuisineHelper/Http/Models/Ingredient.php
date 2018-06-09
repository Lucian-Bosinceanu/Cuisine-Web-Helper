<?php

namespace CuisineHelper\Http\Models;

use \Model;

/**
 * @property int    $id
 * @property string $name
 */
class Ingredient extends Model {

    public static $_table = 'ingredients';

    public function getRecipes() {
        return $this->has_many_through(MODELPATH . 'Recipe', MODELPATHMANY . 'IngredientRecipe','ingredient_id','recipe_id','id','id');
    }
}
