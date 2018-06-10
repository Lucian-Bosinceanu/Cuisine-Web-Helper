<?php

namespace CuisineHelper\Http\Models;

use \Model;
use \DomainException;
use Firebase\JWT\JWT;
use CuisineHelper\Library\Router\Router;
use CuisineHelper\Library\Http\View\View;
use CuisineHelper\Http\Models\ModelExceptions\User\UserNotFound;

/**
 * @property int      $user_id
 * @property string   $token
 * @property DateTime $date
 */
class Auth extends Model {

    public static $_table = 'auth_tokens';

    private static $expires = 60;

    private static $loginCookieName = 'login';

    public function getUser() {
        return $this->belongs_to( MODELPATH . 'User', 'user_id', 'id' );
    }

    public static function authenticate( $user ) {
        $result        = ['jwt' => '', 'exp' => ''];
        $secret        = env( 'JWT_SECRET' );
        $alg           = env( 'JWT_ALG', 'HS256' );
        $exp           = time() + self::$expires;
        $token         = [
            "iss"  => "cuisine_web_helper",
            "iat"  => time(),
            "exp"  => time() + self::$expires,
            "user" => json_encode($user) 
        ];
        $jwt           = JWT::encode( $token, $secret, $alg );
        $result['jwt'] = $jwt;
        $result['exp'] = $exp;
        return $result;
    }

    public static function check() {
        return self::checkAuthenticated();
    }

    public static function checkAdmin() {
        $user = self::user();
        return $user ? (bool) $user->is_admin : false;
    }

    public static function getLoginCookie() {
        return json_decode(Router::request()->cookies()->get(self::$loginCookieName), true);
    }

    public static function deleteLoginCookie() {
        Router::response()->cookie('login', "", 1, "/");
    }

    public static function user() {
        $decoded = json_decode(json_encode(self::getDecoded()), true);
        if ($decoded) {
            $user = json_decode($decoded['user'], true);
            try {
                return User::getUser($user['username']);
            } catch(UserNotFound $ex) {
                return false;
            }
        }
    }

    private static function decodeToken($token = '') {
        if (isset($token) && $token) {
            $secret  = env( 'JWT_SECRET' );
            $alg     = env( 'JWT_ALG', 'HS256' );
            try {
                return JWT::decode( $token, $secret, [$alg] );
            } catch(Exception $ex) {
                return false;
            }
        }
    }

    private static function checkAuthenticated() {
        $decoded = self::getDecoded();
        return isset($decoded->user) ? true : false;
    }

    private static function getDecoded() {
        $result = null;
        $cookie = self::getLoginCookie();
        if (!isset($cookie['token'])) {
            return false;
        }
        return self::decodeToken($cookie['token']);
    }
}
