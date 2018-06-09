<?php

namespace CuisineHelper\Http\Models\ManyToMany;

use \Model;

/**
 * @property int    $user_id
 * @property int    $tag_id
 */
class FoodRestriction extends Model {

    public static $_table = 'food_restrictions';

}
