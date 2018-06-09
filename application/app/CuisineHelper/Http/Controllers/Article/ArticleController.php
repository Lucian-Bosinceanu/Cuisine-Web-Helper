<?php

namespace CuisineHelper\Http\Controllers\Article;

use CuisineHelper\Library\Http\Controller\BaseController;

class ArticleController extends BaseController {
    public function index() {
        return view('articles.index');
    }
}