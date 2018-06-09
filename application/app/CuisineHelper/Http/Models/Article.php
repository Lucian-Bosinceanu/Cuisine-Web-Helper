<?php

namespace CuisineHelper\Http\Models;

use \Model;

/**
 * @property int    $id
 * @property int    $user_id
 * @property string $title
 * @property string $image
 * @property string $url
 * @property string $description
 */
class Article extends Model {

    public static $_table = 'articles';

}
