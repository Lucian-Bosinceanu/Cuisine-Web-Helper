<?php

use CuisineHelper\Library\Router\Router as Router;

// Recipes
Router::get("/", "RecipeController@index")->setName('recipes.index');
Router::get("/recipes/create", "RecipeController@create")->setName('recipes.create');
Router::get("/recipes/[i:id]", "RecipeController@show")->setName('recipes.show');
Router::get("/recipes/[i:id]/edit", "RecipeController@edit")->setName('recipes.edit');
Router::post("/recipes", "RecipeController@store")->setName('recipes.store');
Router::post("/recipes/[i:id]/update", "RecipeController@update")->setName('recipes.update');
Router::delete("/recipes/[i:id]", "RecipeController@delete")->setName('recipes.delete');

// Articles
Router::get("/articles", "Article/ArticleController@index")->setName("articles.index");

// Auth
Router::get("/login", "Auth/LoginController@index")->setName('auth.login_index');
Router::get("/register", "Auth/RegisterController@index")->setName('auth.register_index');
Router::post("/register", "Auth/RegisterController@register")->setName('auth.register');
Router::post("/login", "Auth/LoginController@login")->setName('auth.login');
Router::get("/logout", "Auth/LoginController@logout")->setName('auth.logout');

// User
Router::get("/account", "UserController@account")->setName('user.account');