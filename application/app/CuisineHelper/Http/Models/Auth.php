<?php

namespace CuisineHelper\Http\Models;

use \Model;
use Firebase\JWT\JWT;

/**
 * @property int      $user_id
 * @property string   $token
 * @property DateTime $date
 */
class Auth extends Model {

    public static $_table = 'auth_tokens';

    public static $expires = 20;

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
            "user" => json_encode( $user )
        ];
        $jwt           = JWT::encode( $token, $secret, $alg );
        $result['jwt'] = $jwt;
        $result['exp'] = $exp;
        return $result;
    }

    public static function checkAuthenticated( $jwt ) {
        $secret  = env( 'JWT_SECRET' );
        $alg     = env( 'JWT_ALG', 'HS256' );
        $decoded = JWT::decode( $jwt, $secret, [ $alg ] );
        print_r( $decoded );
        exit;
    }
}
