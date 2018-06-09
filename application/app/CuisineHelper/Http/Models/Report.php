<?php

namespace CuisineHelper\Http\Models;

use \Model;

/**
 * @property int    $id
 * @property int    $user_id
 * @property int    $recipe_id
 * @property string $reason
 * @property string $comment
 */
class Report extends Model {

    public static $_table = 'reports';

}
