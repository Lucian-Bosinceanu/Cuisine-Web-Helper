<?php

namespace CuisineHelper\Http\Controllers\Auth;

use CuisineHelper\Library\Http\Controller\BaseController;

class RegisterController extends BaseController {
    public function index() {
        return view("auth.register");
    }

    public function register() {
        // return redirect
    }
}