<?php

namespace CuisineHelper\Http\Controllers;

use Klein\Request as Request;
use Klein\Response as Response;
use CuisineHelper\Library\Http\Controller\BaseController;

class IndexController extends BaseController {

    public function index(Request $request, Response $response) {
        return view('login');
    }

    public function admin($req, Response $res) {
        print_r(" Admin");
        $res->lock();
    }
}
