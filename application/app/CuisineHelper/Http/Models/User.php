<?php

namespace CuisineHelper\Http\Models;

use \Model;
use CuisineHelper\Http\Models\Article;

/**
 * @property int    $id
 * @property string $username
 * @property string $password
 * @property string $email
 */
class User extends Model {

    public static $_table = 'users';
    public static $_table_use_short_name = true;

    public function getArticles() {
        return $this->has_many('Article','user_id','id');
    }
}
