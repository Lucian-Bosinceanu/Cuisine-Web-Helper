<?php

namespace CuisineHelper\Http\Controllers\Auth;

use CuisineHelper\Http\Models\ModelExceptions\User\DuplicateEmail;
use CuisineHelper\Http\Models\ModelExceptions\User\DuplicateUsername;
use CuisineHelper\Library\Http\Controller\BaseController;

use CuisineHelper\Http\Models\User;

class RegisterController extends BaseController {

    public function index() {
        return view( "auth.register" );
    }

    public function register( $request, $response ) {
        $params = $request->paramsPost()->all();
        try {
            User::createOrFail( $params );
        } catch ( DuplicateEmail | DuplicateUsername $e ) {
            unset( $params['password'] );
            $message = $e instanceof DuplicateEmail ? 'Email' : 'Username';

            return error_view( 'auth.register', $params, $message . ' already exists!' );
        }

        return $response->redirect( route( 'recipes.index' ) );
    }
}
