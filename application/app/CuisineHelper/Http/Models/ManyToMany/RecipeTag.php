<?php

namespace CuisineHelper\Http\Models\ManyToMany;

use \Model;

/**
 * @property int    $tag_id
 * @property int    $recipe_id
 */
class RecipeTag extends Model {

    public static $_table = 'tags_recipes';

}
