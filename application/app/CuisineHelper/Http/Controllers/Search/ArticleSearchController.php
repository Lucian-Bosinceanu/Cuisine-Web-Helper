<?php

namespace CuisineHelper\Http\Controllers\Search;

use CuisineHelper\Library\Http\Controller\BaseController;
use CuisineHelper\Http\Models\Article;

class ArticleSearchController extends BaseController {
    public function searchTitle($request) {
        $title = $request->paramsPost()->get('title');
        $articles = Article::searchByTitle($title);
        $articles = $articles == null ? [] : $articles;
        return view('partials.article_list', ['articles' => $articles]);
    }
}