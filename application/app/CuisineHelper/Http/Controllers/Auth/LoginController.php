<?php

namespace CuisineHelper\Http\Controllers\Auth;

use CuisineHelper\Library\Http\Controller\BaseController;

class LoginController extends BaseController {

    public function index() {
        return view('auth.login');
    }

    public function login() {
        return 'login';
    }
}
