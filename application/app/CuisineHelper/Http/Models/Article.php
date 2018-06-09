<?php

namespace CuisineHelper\Http\Models;

use \Model;
use CuisineHelper\Http\Models\User as User;

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

    public function getUser() {
        return $this->belongs_to('User','user_id','id');
    }
}
