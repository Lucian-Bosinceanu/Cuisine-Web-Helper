<?php

namespace CuisineHelper\Http\Controllers\Article;

use CuisineHelper\Library\Http\Controller\BaseController;
use CuisineHelper\Http\Models\Article;

class ArticleController extends BaseController {
    public function index($request) {
        $articles = Article::findMany();
        print_r($request->cookies());
        return view('articles.index', ['articles' => $articles]);
    }

    public function create() {
        return view('articles.create');
    }

    public function store($request) {
        $params = $request->paramsPost()->all();

        $createdArticle = $this->insertIntoArticles(Article::create(), $request);
        if ($createdArticle == null)
            exit;
    }

    public function edit() {
        return view('articles.edit');
    }

    public function update($request) {
        $params = $request->paramsPost()->all();
        $articleId = $params['id'];
        $article = Article::find_one($articleId);

        $this->insertIntoArticles($article, $request);
    }

    public function delete($request) {
        $params = $request->paramsPost()->all();
        $articleId = $params['id'];
        $article = Article::find_one($articleId);

        unlink($article->image);
        $article->delete();
    }

    private function insertIntoArticles($article, $request) {
        $params = $request->paramsPost()->all();
        
        unlink($article->image);

        $articleTitle = $params['add'];

        $uploadedImage = $request->files()->get('image-upload');
        $imageTmpName = $uploadedImage['tmp_name'];
        $imageName = time() . '_' . random_int(1,100000) . '_' . $uploadedImage['name'];
        $imagePath = /*base_path() .*/ '../storage/app/img/' .  $imageName ;

        $description = $params['description'];
        $site = $params['site'];

        $anotherSameArticle = Article::where([
            'title' => $articleTitle, 
            'url' => $site
        ])->findOne();

        if ($anotherSameArticle)
            return null;

        move_uploaded_file($imageTmpName,$imagePath);
        $article->title = $articleTitle;
        $article->image = $imagePath;
        $article->site = $site;
        $article->description = $description;
        
        $article->save();

        return $article;
    }
}