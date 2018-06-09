<?php

namespace CuisineHelper\Http\Models\ManyToMany;

use \Model;

/**
 * @property int    $user_id
 * @property int    $recipe_id
 */
class FavouriteRecipe extends Model {

    public static $_table = 'favourite_recipe';

}
