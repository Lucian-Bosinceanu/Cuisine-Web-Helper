<?php

namespace CuisineHelper\Http\Models;

use \Model;

/**
 * @property int    $user_id
 * @property string $token
 * @property DateTime $date 
 */
class Auth extends Model {

    public static $_table = 'auth_tokens';

    public function getUser() {
        return $this->belongs_to(MODELPATH . 'User', 'user_id', 'id');
    }
}
