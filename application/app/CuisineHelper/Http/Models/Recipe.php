<?php

namespace CuisineHelper\Http\Models;

use \Model;

/**
 * @property int    $id
 * @property string $title
 * @property int $difficulty
 * @property int $time
 * @property string instructions
 * @property $image
 */
class Recipe extends Model {

    public static $_table = 'recipes';

}
