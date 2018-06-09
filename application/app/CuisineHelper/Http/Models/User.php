<?php

namespace CuisineHelper\Http\Models;

use \Model;

/**
 * @property int    $id
 * @property string $username
 * @property string $password
 * @property string $email
 */
class User extends Model {

    public static $_table = 'users';

}
