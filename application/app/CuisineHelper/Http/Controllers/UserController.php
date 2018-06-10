<?php

namespace CuisineHelper\Http\Controllers;

use CuisineHelper\Library\Http\Controller\BaseController;

class UserController extends BaseController {
    public function account() {
        return view('user.account');
    }
}