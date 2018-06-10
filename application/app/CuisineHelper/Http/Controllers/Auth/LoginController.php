<?php

namespace CuisineHelper\Http\Controllers\Auth;

use CuisineHelper\Http\Models\ModelExceptions\User\UserNotFound;
use CuisineHelper\Library\Http\Controller\BaseController;
use CuisineHelper\Http\Models\User;
use CuisineHelper\Http\Models\Auth;

class LoginController extends BaseController {

    public function index() {
        return view( 'auth.login' );
    }

    public function login( $request, $response ) {
        $params = $request->paramsPost()->all();
        try {
            $user = User::getUser( $params );
        } catch ( UserNotFound $e ) {
            unset( $params['password'] );

            return error_view( 'auth.login', $params, 'Wrong Credentials!' );
        }

        $formPass = $params['password'];
        if ( hash( 'sha512', $formPass ) == $user->password ) {
            $user = $user->asArray();
            unset( $user['password'] );
            $auth   = Auth::authenticate( $user );
            $token  = $auth['jwt'];
            $exp    = $auth['exp'];
            $cookie = $response->cookie( 'login', json_encode( [ 'token' => $token ] ), $exp, "/" );

            return $response->redirect( route( 'recipes.index' ) );
        } else {
            unset( $params['password'] );

            return error_view( 'auth.login', $params, 'Wrong Credentials!' );
        }
    }
}
