<?php

namespace CuisineHelper\Http\Models\ManyToMany;

use \Model;

/**
 * @property int    $user_id
 * @property int    $recipe_id
 */
class MyRecipe extends Model {

    public static $_table = 'my_recipes';

}
