<?php

namespace CuisineHelper\Http\Controllers\Auth;

use CuisineHelper\Library\Http\Controller\BaseController;
use CuisineHelper\Http\Models\User;

class LoginController extends BaseController {

    public function index() {
        return view('auth.login');
    }

    public function login($request, $response) {
        $params = $request->paramsPost()->all();
        $uOrEmail = $params['username-email'];
        $user = User::whereAnyIs([
            ['username' => $uOrEmail],
            ['email' => $uOrEmail]
        ])->findOne();
        if ($user) {
            $formPass = $params['password'];
            if (hash('sha512', $formPass) == $user->password) {
                return $response->redirect(route('recipes.index'));
            }
        }
        
        print_r($params);exit;
        return $response->redirect(route('recipes.index'));
    }
}
