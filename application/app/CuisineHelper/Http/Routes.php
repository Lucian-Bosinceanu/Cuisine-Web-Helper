<?php

use CuisineHelper\Library\Router\Router as Router;

// Recipes
Router::get("/", "RecipeController@index")->setName('recipes.index');
Router::get("/recipes/create", "RecipeController@create", [ 'middleware' =>[ 'CheckAuth', 'CheckAdmin']])->setName('recipes.create');
Router::get("/recipes/[i:id]", "RecipeController@show")->setName('recipes.show');
Router::get("/recipes/[i:id]/edit", "RecipeController@edit", ['middleware' => [ 'CheckAuth', 'CheckAdmin'] ])->setName('recipes.edit');
Router::post("/recipes", "RecipeController@store", ['middleware' =>[ 'CheckAuth', 'CheckAdmin']])->setName('recipes.store');
Router::post("/recipes/[i:id]/update", "RecipeController@update", ['middleware' => [ 'CheckAuth', 'CheckAdmin']])->setName('recipes.update');
Router::delete("/recipes/[i:id]", "RecipeController@delete", ['middleware' => [ 'CheckAuth', 'CheckAdmin']])->setName('recipes.delete');

// Articles
Router::get("/articles", "Article/ArticleController@index")->setName("articles.index");
Router::get("/articles/create", "Article/ArticleController@create", ['middleware' => [ 'CheckAuth', 'CheckAdmin']])->setName("articles.create");
Router::post("/articles", "Article/ArticleController@store", ['middleware' => [ 'CheckAuth', 'CheckAdmin']])->setName('articles.store');
Router::get("/articles/[i:id]/edit", "Article/ArticleController@edit", ['middleware' => [ 'CheckAuth', 'CheckAdmin']])->setName('articles.edit');
Router::post("/articles/[i:id]/update", "Article/ArticleController@update", ['middleware' => [ 'CheckAuth', 'CheckAdmin']])->setName('articles.update');
Router::delete("/articles/[i:id]", "Article/ArticleController@delete", ['middleware' => [ 'CheckAuth', 'CheckAdmin']])->setName('articles.delete');

// Auth
Router::get("/login", "Auth/LoginController@index", ['middleware' => [ 'CheckGuest']])->setName('auth.login_index');
Router::get("/register", "Auth/RegisterController@index",['middleware' => [ 'CheckGuest']] )->setName('auth.register_index');
Router::post("/register", "Auth/RegisterController@register", ['middleware' => ['CheckGuest']])->setName('auth.register');
Router::post("/login", "Auth/LoginController@login", ['middleware' => ['CheckGuest']])->setName('auth.login');
Router::get("/logout", "Auth/LoginController@logout", ['middleware' => [ 'CheckAuth']])->setName('auth.logout');

// User
Router::get("/account", "UserController@account", ['middleware' => [ 'CheckAuth']])->setName('user.account');

// Search
Router::post("/searchTitle", "RecipeSearchController@searchTitle")->setName('search.recipe_title');