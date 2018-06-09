<?php

namespace CuisineHelper\Http\Models;

use \Model;

/**
 * @property int    $user_id
 * @property string $token
 * @property string $date
 */
class Auth extends Model {

    public static $_table = 'auth_tokens';

}
