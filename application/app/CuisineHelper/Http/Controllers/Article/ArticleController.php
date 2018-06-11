<?php

namespace CuisineHelper\Http\Controllers\Article;

use CuisineHelper\Library\Http\Controller\BaseController;
use CuisineHelper\Http\Models\Article;

class ArticleController extends BaseController {
    
    public function index($request) {
        $articles = Article::order_by_asc('created_at')->offset(0)->limit(15)->findMany();
        //print_r($request->cookies());
        
<<<<<<< HEAD


        return view('articles.index', ['articles' => $articles]);
=======
        return view('articles.index', ['articles' => $articles, 'ajaxUrls' => ['searchArticle' => route("search.article_title")]]);
>>>>>>> eaf6fd76d7dff89c983511bb6c409ca44866c9d9
    }

    public function create() {
        $operation = "Add";
        $redirect = route("articles.store");
        return view('articles.create', ['operation' => $operation, 'redirect' => $redirect]);
    }

    public function store($request) {
        $params = $request->paramsPost()->all();

        $createdArticle = $this->insertIntoArticles(Article::create(), $request);
        if ($createdArticle == null)
            return redirect(route('defaults.error_view'));

        return redirect(route('articles.index'));
    }

    public function edit($request) {
        $operation = "Edit";
        $articleId = $request->paramsNamed()->get('id');
        $redirect = route("articles.update",['id' => $articleId]);

        $article = Article::findOne($articleId);
        $imageSrc = $article->getImagePath();

        return view('articles.create', ['operation' => $operation, 'article' => $article, 'image' => $imageSrc, 'redirect' => $redirect]);
    }

    public function update($request) {
        
        $params = $request->paramsNamed()->all();
        $articleId = $params['id'];
        $article = Article::find_one($articleId);

        $this->insertIntoArticles($article, $request);
        return redirect(route('articles.index'));
    }

    public function delete($request) {
<<<<<<< HEAD
        
        $params = $request->paramsPost()->all();
=======
        $params = $request->paramsNamed()->all();
>>>>>>> eaf6fd76d7dff89c983511bb6c409ca44866c9d9
        $articleId = $params['id'];
        $article = Article::find_one($articleId);

        unlink($article->image);
        $article->delete();

        return redirect(route('articles.index'));
    }

    private function insertIntoArticles($article, $request) {
        $params = $request->paramsPost()->all();

        if ($article->image != null)
            unlink($article->getImagePath());

        $articleTitle = $params['add'];

        $uploadedImage = $request->files()->get('image-upload');
        $imageTmpName = $uploadedImage['tmp_name'];

        if ($uploadedImage == null)
            $imageName = $article->image;
            else
            $imageName = time() . '_' . random_int(1,100000) . '_' . $uploadedImage['name'];
        $imagePath = /*base_path() .*/ config('app')['imagepath'] .  $imageName ;

        $description = $params['description'];
        $site = $params['site'];

        $anotherSameArticle = Article::where([
            'title' => $articleTitle, 
            'url' => $site,
            'image' => $imageName
        ])->findOne();

        if ($anotherSameArticle)
            return null;

        $article->title = $articleTitle;
        $article->image = $imageName;
        $article->url = $site;
        $article->description = $description;

        $article->save();
        
        print_r($imageTmpName);
        print_r($imagePath);
        exit;

        if ($uploadedImage != null)
            move_uploaded_file($imageTmpName,$imagePath);

        return $article;
    }
}