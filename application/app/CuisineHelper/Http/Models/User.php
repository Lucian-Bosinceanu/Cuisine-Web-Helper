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

    public function getArticles() {
        return $this->has_many( MODELPATH . 'Article','user_id','id');
    }
}
