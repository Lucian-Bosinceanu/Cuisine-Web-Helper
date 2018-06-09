<?php

namespace CuisineHelper\Http\Controllers\Auth;

use CuisineHelper\Library\Http\Controller\BaseController;

use CuisineHelper\Http\Models\User;
use CuisineHelper\Http\Models\Auth;

class RegisterController extends BaseController {
    public function index() {
        return view("auth.register");
    }

    public function register($request, $response) {
        $params = $request->paramsPost()->all();
        $params['password'] = hash('sha512', $params['password']);
        $user = User::create($params)->save();
        return $response->redirect(route('recipes.index'));
    }
}