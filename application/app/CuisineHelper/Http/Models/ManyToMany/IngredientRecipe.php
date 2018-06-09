<?php

namespace CuisineHelper\Http\Models\ManyToMany;

use \Model;

/**
 * @property int    $ingredient_id
 * @property int    $recipe_id
 * @property string $quantity
 */
class IngredientRecipe extends Model {

    public static $_table = 'ingredients_recipes';

}
