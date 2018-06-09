<?php

use CuisineHelper\Library\Router\Router as Router;

Router::route( "get", "/", "RecipeController@index" )->setName('recipe.index');
Router::route( "get", "/recipes/[i:id]", "RecipeController@show" )->setName('recipe.show');
Router::route( "get", "/login", "Auth/LoginController@index" )->setName('auth.index');
Router::route( "post", "/login", "Auth/LoginController@login" )->setName('auth.login');
