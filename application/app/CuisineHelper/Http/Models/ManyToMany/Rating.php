<?php

namespace CuisineHelper\Http\Models\ManyToMany;

use \Model;

/**
 * @property int    $user_id
 * @property int    $recipe_id
 * @property int    $rating
 */
class Rating extends Model {

    public static $_table = 'ratings';

}
